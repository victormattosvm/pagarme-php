<?php

namespace PagarMe\v5;

use PagarMe\v5\Endpoints\Addresses;
use PagarMe\v5\Endpoints\Cards;
use PagarMe\v5\Endpoints\Charges;
use PagarMe\v5\Endpoints\Customers;
use PagarMe\v5\Endpoints\OrderItems;
use PagarMe\v5\Endpoints\Orders;
use PagarMe\v5\Endpoints\Recipients;

class ClientEndpoints
{
    /**
     * @var Orders
     */
    private Orders $orders;
    
    /**
     * @var OrderItems
     */
    private OrderItems $orderItems;
    
    /**
     * @var Charges
     */
    private Charges $charges;

    /**
     * @var Customers
     */
    private Customers $customers;

    /**
     * @var Addresses
     */
    private Addresses $addresses;

    /**
     * @var Cards
     */
    private Cards $cards;

    /**
     * @var Recipients
     */
    private Recipients $recipients;

    /**
     * @var Withdrawals
     */
    private Withdrawals $withdrawals;

    /**
     * @param string $apiKey
     * @param array|null $extras
     */
    public function __construct()
    {
        $this->orders = new Orders($this);
        $this->orderItems = new OrderItems($this);
        $this->charges = new Charges($this);
        $this->customers = new Customers($this);
        $this->addresses = new Addresses($this);
        $this->cards = new Cards($this);
        $this->recipients = new Recipients($this);
        $this->withdrawals = new Withdrawals($this);
    }
	
    /**
     * @return Orders
     */
    public function orders(): Orders
    {
        return $this->orders;
    }

	 /**
     * @return Orders
     */
    public function recipients(): Recipients
    {
        return $this->recipients;
    }

    /**
     * @return OrderItems
     */
    public function orderItems(): OrderItems
    {
        return $this->orderItems;
    }

    /**
     * @return Charges
     */
    public function charges(): Charges
    {
        return $this->charges;
    }

    /**
     * @return Customers
     */
    public function customers(): Customers
    {
        return $this->customers;
    }

    /**
     * @return Addresses
     */
    public function addresses(): Addresses
    {
        return $this->addresses;
    }

    /**
     * @return Cards
     */
    public function cards(): Cards
    {
        return $this->cards;
    }

	 /**
     * @return Withdrawals
     */
    public function withdrawals(): Withdrawals
    {
        return $this->withdrawals;
    }
}