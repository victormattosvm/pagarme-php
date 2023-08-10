<?php

namespace PagarMe\Endpoints;

use PagarMe\Client;
use PagarMe\Routes;

class Payables extends Endpoint {

	/**
	 * @param array|null $payload
	 *
	 * @return \ArrayObject
	 */
	public function getList( array $payload = null ) {
		return $this->client->request(
			self::GET,
			Routes::payables()->base(),
			array( 'query' => $payload )
		);
	}

	/**
	 * @param string $payableId
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function get( $payableId, array $payload ) {
		return $this->client->request(
			self::GET,
			Routes::payables()->details( $payableId ),
			array( 'json' => $payload )
		);
	}

}
