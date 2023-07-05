<?php

namespace PagarMe\Endpoints;

use PagarMe\Client;
use PagarMe\Routes;

class AnticipationSettings extends Endpoint {

	/**
	 * @param array $payload
	 *
	 * @return \ArrayObject
	 */
	public function update( $recipientId, array $payload ) {
		return $this->client->request(
			self::PATCH,
			Routes::anticipationSettings()->updateAnticipationSettings( $recipientId ),
			array( 'json' => $payload )
		);
	}
}
