<?php

namespace PagarMe\v4\Endpoints;

use PagarMe\v4\Client;
use PagarMe\v4\Routes;
use PagarMe\v4\Endpoints\Endpoint;

class Search extends Endpoint
{
    /**
     * @param array|null $payload
     *
     * @return \ArrayObject
     */
    public function get(array $payload = null)
    {
        return $this->client->request(
            self::GET,
            Routes::search()->base(),
            ['query' => $payload]
        );
    }
}
