<?php

namespace PagarMe\v4\Endpoints;

use PagarMe\v4\Client;
use PagarMe\v4\Routes;
use PagarMe\v4\Endpoints\Endpoint;

class BalanceOperations extends Endpoint
{
    /**
     * @param array|null $payload
     *
     * @return \ArrayObject
     */
    public function getList(array $payload = null)
    {
        return $this->client->request(
            self::GET,
            Routes::balanceOperations()->base(),
            ['query' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function get(array $payload)
    {
        return $this->client->request(
            self::GET,
            Routes::balanceOperations()->details($payload['id'])
        );
    }
}
