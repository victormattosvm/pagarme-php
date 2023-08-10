<?php

namespace PagarMe;

use PagarMe\Endpoints\Addresses;
use PagarMe\Endpoints\Cards;
use PagarMe\Endpoints\Charges;
use PagarMe\Endpoints\Customers;
use PagarMe\Endpoints\OrderItems;
use PagarMe\Endpoints\Orders;
use PagarMe\Endpoints\Recipients;
use PagarMe\Endpoints\Withdrawals;
use PagarMe\Endpoints\BankAccounts;
use PagarMe\Endpoints\TransferSettings;
use PagarMe\Endpoints\AnticipationSettings;
use PagarMe\Endpoints\Balance;
use PagarMe\Endpoints\BalanceOperations;
use PagarMe\Endpoints\Payables;

class ClientEndpoints {

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
	 * @var Balance
	 */
	private Balance $balance;

	/**
	 * @var BalanceOperations
	 */
	private BalanceOperations $balanceOperations;

	/**
	 * @var Payables
	 */
	private Payables $payables;

	/**
	 * @var Withdrawals
	 */
	private Withdrawals $withdrawals;

	 /**
	  * @var BankAccounts
	  */
	private BankAccounts $bankAccounts;

	 /**
	  * @var TransferSettings
	  */
	private TransferSettings $transferSettings;

	/**
	 * @var AnticipationSettings
	 */
	private AnticipationSettings $anticipationSettings;

	/**
	 * @param string     $apiKey
	 * @param array|null $extras
	 */
	public function __construct() {
		$this->orders               = new Orders( $this );
		$this->orderItems           = new OrderItems( $this );
		$this->charges              = new Charges( $this );
		$this->customers            = new Customers( $this );
		$this->addresses            = new Addresses( $this );
		$this->cards                = new Cards( $this );
		$this->recipients           = new Recipients( $this );
		$this->withdrawals          = new Withdrawals( $this );
		$this->bankAccounts         = new BankAccounts( $this );
		$this->transferSettings     = new TransferSettings( $this );
		$this->anticipationSettings = new AnticipationSettings( $this );
		$this->balance 				= new Balance( $this );
		$this->balanceOperations	= new BalanceOperations( $this );
		$this->payables				= new Payables( $this );
	}

	/**
	 * @return Orders
	 */
	public function orders(): Orders {
		return $this->orders;
	}

	 /**
	  * @return Recipients
	  */
	public function recipients(): Recipients {
		return $this->recipients;
	}

	/**
	 * @return OrderItems
	 */
	public function orderItems(): OrderItems {
		return $this->orderItems;
	}

	/**
	 * @return Charges
	 */
	public function charges(): Charges {
		return $this->charges;
	}

	/**
	 * @return Customers
	 */
	public function customers(): Customers {
		return $this->customers;
	}

	/**
	 * @return Addresses
	 */
	public function addresses(): Addresses {
		return $this->addresses;
	}

	/**
	 * @return Cards
	 */
	public function cards(): Cards {
		return $this->cards;
	}

	 /**
	  * @return Withdrawals
	  */
	public function withdrawals(): Withdrawals {
		return $this->withdrawals;
	}

	 /**
	  * @return BankAccounts
	  */
	public function bankAccounts(): BankAccounts {
		return $this->bankAccounts;
	}

	/**
	 * @return TransferSettings
	 */
	public function transferSettings(): TransferSettings {
		return $this->transferSettings;
	}

	/**
	 * @return AnticipationSettings
	 */
	public function anticipationSettings(): AnticipationSettings {
		return $this->anticipationSettings;
	}

	/**
	 * @return Payables
	 */
	public function payables(): Payables {
		return $this->payables;
	}

	/**
	 * @return Balance
	 */
	public function balance(): Balance {
		return $this->balance;
	}

	/**
	 * @return BalanceOperations
	 */
	public function balanceOperations(): BalanceOperations {
		return $this->balanceOperations;
	}
}
