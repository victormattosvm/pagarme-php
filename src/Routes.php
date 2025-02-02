<?php

namespace PagarMe;

use PagarMe\Anonymous;

class Routes {

	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function orders() {
		$anonymous = new Anonymous();

		$anonymous->base = static function () {
			return 'orders';
		};

		$anonymous->details = static function ( $id ) {
			return "orders/$id";
		};

		$anonymous->addCharge = static function () {
			return 'charges';
		};

		$anonymous->closed = static function ( $id ) {
			return "orders/$id/closed";
		};

		return $anonymous;
	}

	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function orderItems() {
		$anonymous = new Anonymous();

		$anonymous->base = static function ( $idOrder ) {
			return "orders/$idOrder/items";
		};

		$anonymous->details = static function ( $idOrder, $idItem ) {
			return "orders/$idOrder/items/$idItem";
		};

		$anonymous->update = static function ( $idOrder, $idItem ) {
			return "orders/$idOrder/items/$idItem";
		};

		$anonymous->delete = static function ( $idOrder, $idItem ) {
			return "orders/$idOrder/items/$idItem";
		};

		$anonymous->deleteAll = static function ( $idOrder ) {
			return "orders/$idOrder/items";
		};

		return $anonymous;
	}

	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function recipients() {
		$anonymous = new Anonymous();

		$anonymous->base = static function () {
			return 'recipients';
		};

		$anonymous->details = static function ( $id ) {
			return "recipients/$id";
		};

		$anonymous->balance = static function ( $id ) {
			return "recipients/$id/balance";
		};

		$anonymous->balanceOperations = static function () {
			return 'balance/operations';
		};

		$anonymous->balanceOperation = static function ( $balanceOperationId ) {
			return "balance/operations/$balanceOperationId";
		};

		return $anonymous;
	}


	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function customers() {
		$anonymous = new Anonymous();

		$anonymous->base = static function () {
			return 'customers';
		};

		$anonymous->details = static function ( $id ) {
			return "customers/$id";
		};

		return $anonymous;
	}

	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function addresses() {
		$anonymous = new Anonymous();

		$anonymous->base = static function ( $customer_id ) {
			return "customers/$customer_id/addresses";
		};

		$anonymous->details = static function ( $customer_id, $address_id ) {
			return "customers/$customer_id/addresses/$address_id";
		};

		$anonymous->delete = static function ( $customer_id, $address_id ) {
			return "customers/$customer_id/addresses/$address_id";
		};

		return $anonymous;
	}

	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function cards() {
		$anonymous = new Anonymous();

		$anonymous->base = static function ( $id ) {
			return "customers/$id/cards";
		};

		$anonymous->details = static function ( $id, $card_id ) {
			return "customers/$id/cards/$card_id";
		};

		$anonymous->delete = static function ( $id, $card_id ) {
			return "customers/$id/cards/$card_id";
		};

		$anonymous->renew = static function ( $id, $card_id ) {
			return "customers/$id/cards/$card_id/renew";
		};

		return $anonymous;
	}

	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function charges() {
		$anonymous = new Anonymous();

		$anonymous->base = static function () {
			return 'charges';
		};

		$anonymous->details = static function ( $id ) {
			return "charges/$id";
		};

		$anonymous->capture = static function ( $id ) {
			return "charges/$id/capture";
		};

		$anonymous->updateCard = static function ( $id ) {
			return "charges/$id/card";
		};

		$anonymous->updateBillingDue = static function ( $id ) {
			return "charges/$id/due-date";
		};

		$anonymous->updatePaymentMethod = static function ( $id ) {
			return "charges/$id/payment-method";
		};

		$anonymous->holdCharge = static function ( $id ) {
			return "charges/$id/retry";
		};

		$anonymous->confirmCash = static function ( $id ) {
			return "charges/$id/confirm-payment";
		};

		$anonymous->cancel = static function ( $id ) {
			return "charges/$id";
		};

		return $anonymous;
	}

	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function withdrawals() {
		$anonymous = new Anonymous();

		$anonymous->base = static function ( $recipientId ) {
			return "recipients/$recipientId/withdrawals";
		};

		$anonymous->details = static function ( $recipientId, $id ) {
			return "recipients/$recipientId/withdrawals/$id";
		};

		return $anonymous;
	}

	 /**
	  * @return \PagarMe\Anonymous
	  */
	public static function bankAccounts() {
		 $anonymous = new Anonymous();

		$anonymous->updateBankAccount = static function ( $recipientId ) {
			return "recipients/$recipientId/default-bank-account";
		};

		return $anonymous;
	}

	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function transferSettings() {
		 $anonymous = new Anonymous();

		$anonymous->updateTransferSettings = static function ( $recipientId ) {
			return "recipients/$recipientId/transfer-settings";
		};

		return $anonymous;
	}

	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function anticipationSettings() {
		$anonymous = new Anonymous();

		$anonymous->updateAnticipationSettings = static function ( $recipientId ) {
			return "recipients/$recipientId/automatic-anticipation-settings";
		};

		return $anonymous;
	}

	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function payables() {
		$anonymous = new Anonymous();

		$anonymous->base = static function () {
			return 'payables';
		};

		$anonymous->details = static function ( $payableId ) {
			return "payables/$payableId";
		};

		return $anonymous;
	}

	/**
	 * @return \PagarMe\Anonymous
	 */
	public static function kyc() {
		$anonymous = new Anonymous();

		$anonymous->getKycLink = static function ( $recipientId ) {
			return "recipients/$recipient_id/kyc_link";
		};

		return $anonymous;
	}
}
