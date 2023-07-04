<?php

namespace PagarMe\Endpoints;

use PagarMe\Client;
use PagarMe\Routes;

class BankAccount extends Endpoint
{
    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */  
    public function update($recipientId, array $payload)
    {
        return $this->client->request(
            self::PATCH,
            Routes::bankAccounts()->updateBankAccount($recipientId),
            ['json' => $payload]
        );
    }
}