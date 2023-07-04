<?php

namespace PagarMe\v4\Endpoints;

use PagarMe\v4\Client;

abstract class Endpoint
{
    /**
     * @var string
     */
    const POST = 'POST';
    /**
     * @var string
     */
    const GET = 'GET';
    /**
     * @var string
     */
    const PUT = 'PUT';
    /**
     * @var string
     */
    const DELETE = 'DELETE';

    /**
     * @var \PagarMe\v4\Client
     */
    protected $client;

    /**
     * @param \PagarMe\v4\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
