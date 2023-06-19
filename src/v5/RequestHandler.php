<?php

namespace PagarMe\v5;

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
        $options['Authorization'] = base64_encode($secretKey . ':');
        return $options;
    }
}