<?php

namespace PagarMe;

use PagarMe\v5\Exceptions\PagarMeException;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException as ClientException;
use PagarMe\v5\Exceptions\InvalidJsonException;

class Client extends ClientEndpoints
{
    /**
     * @var string
     */
    const BASE_URI = 'https://api.pagar.me/core/v5/';

    /**
     * @var string header used to identify application's requests
     */
    const PAGARME_USER_AGENT_HEADER = 'X-PagarMe-User-Agent';

    /**
     * @var HttpClient
     */
    private HttpClient $http;

    /**
     * @var string
     */
    private string $publicKey;

    /**
     * @var string
     */
    private string $secretKey;
    
    /**
     * @param string $apiKey
     * @param array|null $extras
     */
    public function __construct(string $secretKey, array $extras = null)
    {
		parent::__construct();

        $this->secretKey = $secretKey;

        $options = ['base_uri' => self::BASE_URI];

        if (!is_null($extras)) {
            $options = array_merge($options, $extras);
        }

        $userAgent = $options['headers']['User-Agent'] ?? '';

        $options['headers']['User-Agent'] = $this->addUserAgentHeaders($userAgent);
        $options['headers']['X-PagarMe-User-Agent'] = $this->addUserAgentHeaders($userAgent);

        $this->http = new HttpClient($options);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     *
     * @return array
     *
     * @throws PagarMeException
     */
    public function request(string $method, string $uri, array $options = []): array
    {
        try {
            $response = $this->http->request(
                $method,
                $uri,
                RequestHandler::bindAuthToHeader(
                    $options,
                    $this->getSecretKey()
                )
            );

            return ResponseHandler::success((string)$response->getBody());
        } catch (InvalidJsonException $exception) {
            throw $exception;
        } catch (ClientException $exception) {
            ResponseHandler::failure($exception);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @return string
     */
    private function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * Build a user-agent string to be informed on requests
     *
     * @param string $customUserAgent
     *
     * @return string
     */
    private function buildUserAgent(string $customUserAgent = ''): string
    {
        return trim(sprintf(
            '%s pagarme-php/%s php/%s',
            $customUserAgent,
            PagarMe::VERSION,
            phpversion()
        ));
    }

    /**
     * Append new keys (the default and pagarme) related to user-agent
     *
     * @param string $customUserAgent
     * @return string
     */
    private function addUserAgentHeaders(string $customUserAgent = ''): string
    {
        return $this->buildUserAgent($customUserAgent);
    }
}