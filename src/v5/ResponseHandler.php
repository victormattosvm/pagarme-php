<?php

namespace PagarMe\v5;

use GuzzleHttp\Exception\ClientException;
use PagarMe\v5\Exceptions\PagarMeException;
use PagarMe\v5\Exceptions\InvalidJsonException;

class ResponseHandler
{
    /**
     * @param string $payload
     *
     * @throws \PagarMe\Exceptions\InvalidJsonException
     * @return \ArrayObject
     */
    public static function success($payload)
    {
        return self::toArray($payload);
    }

    /**
     * @param ClientException $originalException
     *
     * @throws PagarMeException
     * @return void
     */
    public static function failure(\Exception $originalException)
    {
        throw self::parseException($originalException);
    }

    /**
     * @param ClientException $guzzleException
     *
     * @return PagarMeException|ClientException
     */
    private static function parseException(ClientException $guzzleException)
    {
        $response = $guzzleException->getResponse();

        if (is_null($response)) {
            return $guzzleException;
        }

        $body = $response->getBody()->getContents();

       try {
            $responseAsArray = self::toArray($body);
        } catch (InvalidJsonException $invalidJson) {
            $responseAsArray = [];
        }

		return new PagarMeException(
            $responseAsArray['message'],
            $responseAsArray['errors'],
			$response->getStatusCode(),
        );
    }

    /**
     * @param string $json
     * @return array
     * @throws InvalidJsonException
     */
    private static function toArray(string $json): array
    {
        $result = json_decode($json, true);

        if (json_last_error() != \JSON_ERROR_NONE) {
            throw new InvalidJsonException(json_last_error_msg());
        }

        return $result;
    }
}
