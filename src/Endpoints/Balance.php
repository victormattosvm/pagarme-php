<?php

namespace PagarMe\Endpoints;

use PagarMe\Client;
use PagarMe\Routes;

class Balance extends Endpoint {


	/**
	 * @param string $recipientId
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function get( $recipientId ) {
		return $this->client->request(
			self::GET,
			Routes::recipients()->balance( $recipientId )
		);
	}

}
