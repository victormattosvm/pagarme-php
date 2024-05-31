<?php

namespace PagarMe\Endpoints;

use PagarMe\Client;
use PagarMe\Routes;

class Kyc extends Endpoint {
	/**
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function getKyc( $recipientId ) {
		return $this->client->request(
			self::POST,
			Routes::kyc()->getKycLink( $recipientId ),
			array( 'json' => $payload )
		);
	}
}
