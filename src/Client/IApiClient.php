<?php

namespace DivineOmega\CachetPHP\Client;

interface IApiClient
{
    /**
     * @param string $url
     * @param mixed  $data
     * @param string $method
     * @param bool   $authorisationRequired
     *
     * @return ApiResponse
     */
    public function request($url, $data = null, $method = 'GET', $authorisationRequired = true);
}
