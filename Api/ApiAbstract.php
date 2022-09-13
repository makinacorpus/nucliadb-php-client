<?php

namespace Nuclia\Api;

use Nuclia\ApiClient;
use Nuclia\Enum\MethodEnum;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Abstract base class for API classes.
 */

abstract class ApiAbstract
{
    protected $apiClient;

    /**
     *
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * Build Nuclia web API url.
     *
     * @param string $serviceUrlPart
     * @param array  $params
     *
     * @return string
     */
    protected function buildUrl(string $serviceUrlPart, array $params = []): string
    {
        return strtr(
            ApiClient::API_URI_TEMPLATE,
            [
            '%protocol' => ApiClient::API_PROTOCOL,
            '%zone' => $this->apiClient->getProperty('zone'),
            '%domain' => ApiClient::API_DOMAIN,
            '%basepath' => ApiClient::API_BASEPATH,
            '%kbid' => $this->apiClient->getProperty('kbid'),
            '%name' => strtr($serviceUrlPart, $params),
            ]
        );
    }

    /**
     * Send a request to Nuclia web API and return the response.
     *
     * @param string $method
     *
     * @see   ApiClient::API_METHOD_* const
     * @param string $url
     * @param array  $options
     *
     * @return \Symfony\Contracts\HttpClient\ResponseInterface
     */
    protected function request(MethodEnum $method, string $url, array $options = []): ResponseInterface
    {
        // Encode query string manually. @see https://stackoverflow.com/questions/60440737/symfony-httpclient-get-request-with-multiple-query-string-parameters-with-same-n
        if (key_exists('query', $options)) {
            $queryString = preg_replace(
                '/%5B(?:[0-9]|[1-9][0-9]+)%5D=/',
                '=',
                http_build_query($options['query'], '', '&', PHP_QUERY_RFC3986)
            );
            unset($options['query']);
            $url = sprintf('%s?%s', $url, $queryString);
        }

        if ($debug = $this->apiClient->getProperty('debug')) {
            $debug->debugRequest($method->value, $url, $options);
        }

        $response = $this->apiClient->getProperty('httpClient')->request($method->value, $url, $options);

        if ($debug = $this->apiClient->getProperty('debug')) {
            $debug->debugResponse($response);
        }
        return $response;
    }
}
