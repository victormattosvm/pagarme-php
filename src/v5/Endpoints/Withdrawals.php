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
    public function create($recipientId, array $payload)
    {
        return $this->client->request(
            self::POST,
            Routes::withdrawals()->base($recipientId, $payload),
            ['json' => $payload]
        );
    }

    /**
     * @param array|null $payload
     *
     * @return \ArrayObject
     */
    public function getList($recipientId, array $payload = null)
    {
        return $this->client->request(
            self::GET,
            Routes::withdrawals()->base($recipientId),
            ['query' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function get($recipientId, array $payload)
    {
        return $this->client->request(
            self::GET,
            Routes::withdrawals()->details($recipientId, $payload['id'])
        );
    }
}
