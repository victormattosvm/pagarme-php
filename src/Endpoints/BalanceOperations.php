<?php

namespace PagarMe\Endpoints;

use PagarMe\Client;
use PagarMe\Routes;

class BalanceOperations extends Endpoint {

	/**
	 * @param array|null $payload
	 *
	 * @return \ArrayObject
	 */
	public function getList( array $payload = null ) {
		return $this->client->request(
			self::GET,
			Routes::recipients()->balanceOperations( $payload ),
			array( 'json' => $payload )
		);
	}

	/**
	 * @param string $balanceOperationId
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function get( $balanceOperationId, array $payload ) {
		return $this->client->request(
			self::GET,
			Routes::recipients()->balanceOperation( $balanceOperationId ),
			array( 'json' => $payload )
		);
	}

}
