<?php

namespace PagarMe\Endpoints;

use PagarMe\Client;
use PagarMe\Routes;

class Recipients extends Endpoint {

	/**
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function create( array $payload ) {
		return $this->client->request(
			self::POST,
			Routes::recipients()->base(),
			array( 'json' => $payload )
		);
	}

	/**
	 * @param array|null $payload
	 *
	 * @return \ArrayObject
	 */
	public function getList( array $payload = null ) {
		return $this->client->request(
			self::GET,
			Routes::recipients()->base(),
			array( 'query' => $payload )
		);
	}

	/**
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function get( array $payload ) {
		return $this->client->request(
			self::GET,
			Routes::recipients()->details( $payload['id'] )
		);
	}

	/**
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function update( array $payload ) {
		return $this->client->request(
			self::PUT,
			Routes::recipients()->details( $payload['id'] ),
			array( 'json' => $payload )
		);
	}

	/**
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function getBalance( array $payload ) {
		return $this->client->request(
			self::GET,
			Routes::recipients()->balance( $payload['recipient_id'] )
		);
	}

	/**
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function getBalanceOperations( array $payload ) {
		return $this->client->request(
			self::GET,
			Routes::recipients()->balanceOperations( $payload ),
			array( 'json' => $payload )
		);
	}

	/**
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function getBalanceOperation( $balance_operation_id, array $payload ) {
		return $this->client->request(
			self::GET,
			Routes::recipients()->balanceOperation( $balance_operation_id ),
			array( 'json' => $payload )
		);
	}

	/**
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function getPayables( array $payload ) {
		return $this->client->request(
			self::GET,
			Routes::payables()->base(),
			array( 'json' => $payload )
		);
	}

	/**
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function getPayable( $payable_id, array $payload ) {
		return $this->client->request(
			self::GET,
			Routes::payables()->details( $payable_id ),
			array( 'json' => $payload )
		);
	}
}
