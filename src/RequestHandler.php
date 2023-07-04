<?php

namespace PagarMe;

class RequestHandler
{
    /**
     * @param array $options
     * @param string $apiKey
     *
     * @return array
     */
     public static function bindAuthToHeader(array $options, $secretKey)
    {
        $options['auth'] = array( $secretKey, '' );
        return $options;
    }
}