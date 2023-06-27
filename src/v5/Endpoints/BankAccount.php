<?php

namespace PagarMe\v5\Endpoints;

use PagarMe\v5\Client;
use PagarMe\v5\Routes;

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