<?php

namespace PagarMe\v4\Endpoints;

use PagarMe\v4\Client;
use PagarMe\v4\Routes;
use PagarMe\v4\Endpoints\Endpoint;

class Balances extends Endpoint
{
    /**
     * @return \ArrayObject
     */
    public function get()
    {
        return $this->client->request(
            self::GET,
            Routes::balances()->base()
        );
    }
}
