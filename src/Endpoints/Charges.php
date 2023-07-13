<?php

namespace PagarMe\Endpoints;

use PagarMe\Exceptions\PagarMeException;
use PagarMe\Routes;

class Charges extends Endpoint
{
    /**
     * @param array $payload
     *
     * @return array
     * @throws PagarMeException
     */
    public function capture(string $chargeId, array $payload): array
    {
        return $this->client->request(
            self::POST,
            Routes::charges()->capture($chargeId),
            ['json' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return array
     * @throws PagarMeException
     */
    public function updateCard(string $chargeId, array $payload): array
    {
        return $this->client->request(
            self::PUT,
            Routes::charges()->updateCard($chargeId),
            ['json' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return array
     * @throws PagarMeException
     */
    public function updateBillingDue(string $chargeId, array $payload): array
    {
        return $this->client->request(
            self::PATCH,
            Routes::charges()->updateBillingDue($chargeId),
            ['json' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return array
     * @throws PagarMeException
     */
    public function updatePaymentMethod(string $chargeId, array $payload): array
    {
        return $this->client->request(
            self::PATCH,
            Routes::charges()->updatePaymentMethod($chargeId),
            ['json' => $payload]
        );
    }

    /**
     * @param array|null $payload
     *
     * @return array
     * @throws PagarMeException
     */
    public function getList(array $payload = null): array
    {
        return $this->client->request(
            self::GET,
            Routes::charges()->base(),
            ['query' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return array
     * @throws PagarMeException
     */
    public function get(string $chargeId): array
    {
        return $this->client->request(
            self::GET,
            Routes::charges()->details($chargeId)
        );
    }

    /**
     * @param array $payload
     *
     * @return array
     * @throws PagarMeException
     */
    public function confirmCash(string $chargeId, array $payload): array
    {
        return $this->client->request(
            self::POST,
            Routes::charges()->confirmCash($chargeId),
            ['json' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return array
     * @throws PagarMeException
     */
    public function holdCharge(string $chargeId): array
    {
        return $this->client->request(
            self::POST,
            Routes::charges()->holdCharge($chargeId)
        );
    }

    /**
     * @param array $payload
     *
     * @return array
     * @throws PagarMeException
     */
    public function cancel(string $chargeId, array $payload): array
    {
        return $this->client->request(
            self::DELETE,
            Routes::charges()->cancel($chargeId),
            ['json' => $payload]
        );
    }
}