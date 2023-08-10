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

}
