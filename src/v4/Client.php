<?php

namespace PagarMe\v4;

use PagarMe\v4\PagarMe\v4;
use PagarMe\v4\RequestHandler;
use PagarMe\v4\ResponseHandler;
use PagarMe\v4\Endpoints\BankAccounts;
use PagarMe\v4\Endpoints\BulkAnticipations;
use PagarMe\v4\Endpoints\Transactions;
use PagarMe\v4\Endpoints\Customers;
use PagarMe\v4\Endpoints\Cards;
use PagarMe\v4\Endpoints\Recipients;
use PagarMe\v4\Endpoints\PaymentLinks;
use PagarMe\v4\Endpoints\Plans;
use PagarMe\v4\Endpoints\Transfers;
use PagarMe\v4\Endpoints\Subscriptions;
use PagarMe\v4\Endpoints\Refunds;
use PagarMe\v4\Endpoints\Postbacks;
use PagarMe\v4\Endpoints\Balances;
use PagarMe\v4\Endpoints\Payables;
use PagarMe\v4\Endpoints\BalanceOperations;
use PagarMe\v4\Endpoints\Chargebacks;
use PagarMe\v4\Endpoints\Search;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException as ClientException;
use PagarMe\v4\Exceptions\InvalidJsonException;

class Client
{
    /**
     * @var string
     */
    const BASE_URI = 'https://api.pagar.me:443/1/';

    /**
     * @var string header used to identify application's requests
     */
    const PAGARME_USER_AGENT_HEADER = 'X-PagarMe-User-Agent';

    /**
     * @var \GuzzleHttp\Client
     */
    private $http;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var \PagarMe\v4\Endpoints\Transactions
     */
    private $transactions;

    /**
     * @var \PagarMe\v4\Endpoints\Customers
     */
    private $customers;

    /**
     * @var \PagarMe\v4\Endpoints\Cards
     */
    private $cards;

    /**
     * @var \PagarMe\v4\Endpoints\Recipients
     */
    private $recipients;

    /**
     * @var \PagarMe\v4\Endpoints\BankAccounts
     */
    private $bankAccounts;

    /**
     * @var \PagarMe\v4\Endpoints\Plans
     */
    private $plans;

    /**
     * @var \PagarMe\v4\Endpoints\BulkAnticipations
     */
    private $bulkAnticipations;

    /**
     * @var \PagarMe\v4\Endpoints\PaymentLinks
     */
    private $paymentLinks;

    /**
     * @var \PagarMe\v4\Endpoints\Transfers
     */
    private $transfers;

    /**
     * @var \PagarMe\v4\Endpoints\Subscriptions
     */
    private $subscriptions;

    /**
     * @var \PagarMe\v4\Endpoints\Refunds
     */
    private $refunds;

    /**
     * @var \PagarMe\v4\Endpoints\Postbacks
     */
    private $postbacks;

    /**
     * @var \PagarMe\v4\Endpoints\Balances
     */
    private $balances;

    /**
     * @var \PagarMe\v4\Endpoints\Payables
     */
    private $payables;

    /**
     * @var \PagarMe\v4\Endpoints\BalanceOperations
     */
    private $balanceOperations;

    /**
     * @var \PagarMe\v4\Endpoints\Chargebacks
     */
    private $chargebacks;

    /**
     * @var \PagarMe\v4\Endpoints\Search
     */
    private $search;

    /**
     * @param string $apiKey
     * @param array|null $extras
     */
    public function __construct($apiKey, array $extras = null)
    {
        $this->apiKey = $apiKey;

        $options = ['base_uri' => self::BASE_URI];

        if (!is_null($extras)) {
            $options = array_merge($options, $extras);
        }

        $userAgent = isset($options['headers']['User-Agent']) ?
            $options['headers']['User-Agent'] :
            '';

        $options['headers']['User-Agent'] = $this->addUserAgentHeaders($userAgent);
        $options['headers']['X-PagarMe-User-Agent'] = $this->addUserAgentHeaders($userAgent);

        $this->http = new HttpClient($options);

        $this->transactions = new Transactions($this);
        $this->customers = new Customers($this);
        $this->cards = new Cards($this);
        $this->recipients = new Recipients($this);
        $this->bankAccounts = new BankAccounts($this);
        $this->plans = new Plans($this);
        $this->bulkAnticipations = new BulkAnticipations($this);
        $this->paymentLinks = new PaymentLinks($this);
        $this->transfers = new Transfers($this);
        $this->subscriptions = new Subscriptions($this);
        $this->refunds = new Refunds($this);
        $this->postbacks = new Postbacks($this);
        $this->balances = new Balances($this);
        $this->payables = new Payables($this);
        $this->balanceOperations = new BalanceOperations($this);
        $this->chargebacks = new Chargebacks($this);
        $this->search = new Search($this);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     *
     * @throws \PagarMe\v4\Exceptions\PagarMeException
     * @return \ArrayObject
     *
     * @psalm-suppress InvalidNullableReturnType
     */
    public function request($method, $uri, $options = [])
    {
        try {
            $response = $this->http->request(
                $method,
                $uri,
                RequestHandler::bindApiKeyToQueryString(
                    $options,
                    $this->apiKey
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
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Build an user-agent string to be informed on requests
     *
     * @param string $customUserAgent
     *
     * @return string
     */
    private function buildUserAgent($customUserAgent = '')
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
    private function addUserAgentHeaders($customUserAgent = '')
    {
        return $this->buildUserAgent($customUserAgent);
    }

    /**
     * @return \PagarMe\v4\Endpoints\Transactions
     */
    public function transactions()
    {
        return $this->transactions;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Customers
     */
    public function customers()
    {
        return $this->customers;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Cards
     */
    public function cards()
    {
        return $this->cards;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Recipients
     */
    public function recipients()
    {
        return $this->recipients;
    }

    /**
     * @return \PagarMe\v4\Endpoints\BankAccounts
     */
    public function bankAccounts()
    {
        return $this->bankAccounts;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Plans
     */
    public function plans()
    {
        return $this->plans;
    }

    /**
     * @return \PagarMe\v4\Endpoints\BulkAnticipations
     */
    public function bulkAnticipations()
    {
        return $this->bulkAnticipations;
    }

    /**
     * @return \PagarMe\v4\Endpoints\PaymentLinks
     */
    public function paymentLinks()
    {
        return $this->paymentLinks;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Transfers
     */
    public function transfers()
    {
        return $this->transfers;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Subscriptions
     */
    public function subscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Refunds
     */
    public function refunds()
    {
        return $this->refunds;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Postbacks
     */
    public function postbacks()
    {
        return $this->postbacks;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Balances
     */
    public function balances()
    {
        return $this->balances;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Payables
     */
    public function payables()
    {
        return $this->payables;
    }

    /**
     * @return \PagarMe\v4\Endpoints\BalanceOperations
     */
    public function balanceOperations()
    {
        return $this->balanceOperations;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Chargebacks
     */
    public function chargebacks()
    {
        return $this->chargebacks;
    }

    /**
     * @return \PagarMe\v4\Endpoints\Search
     */
    public function search()
    {
        return $this->search;
    }
}
