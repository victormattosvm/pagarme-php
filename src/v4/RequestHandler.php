<?php

namespace PagarMe\v4;

class RequestHandler
{
    /**
     * @param array $options
     * @param string $apiKey
     *
     * @return array
     */
    public static function bindApiKeyToQueryString(array $options, $apiKey)
    {
        $options['query']['api_key'] = $apiKey;

        return $options;
    }
}
