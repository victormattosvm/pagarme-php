<?php

namespace PagarMe\v5\Endpoints;

use PagarMe\v5\Client;
use PagarMe\v5\Routes;

class Withdrawals extends Endpoint
{
    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function create(array $payload)
    {
        return $this->client->request(
            self::POST,
            Routes::withdrawals()->base($payload['recipient_id']),
            ['json' => $payload]
        );
    }

    /**
     * @param array|null $payload
     *
     * @return \ArrayObject
     */
    public function getList(array $payload = null)
    {
        return $this->client->request(
            self::GET,
            Routes::withdrawals()->base($payload['recipient_id']),
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
            Routes::withdrawals()->details($payload['recipient_id'], $payload['id'])
        );
    }
}
