<?php

namespace Nuclia;

use Nuclia\Api\ResourceFieldsApi;
use Nuclia\Api\ResourcesApi;
use Nuclia\Api\SearchApi;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Nuclia API PHP client
 */
class ApiClient
{
    public const API_URI_TEMPLATE = '%protocol://%zone.%domain/%basepath/%kbid/%name';
    public const API_PROTOCOL = 'https';
    public const API_DOMAIN = 'nuclia.cloud';
    public const API_BASEPATH = 'api/v1/kb';

    protected $zone;
    protected $token;
    protected $kbid;
    protected $httpClient;
    protected $debug;

    /**
     * Default http headers to insert into any query.
     *
     * @var array
     */
    protected $defaultHeaders = [];

    /**
     * Initialize Nuclia api client.
     *
     * @param string $zone
     * @param string $token
     * @param string $kbid
     *
     * @return void
     */
    public function __construct(string $zone, string $token, string $kbid)
    {
        $this->zone = $zone;
        $this->token = $token;
        $this->kbid = $kbid;
        $this->httpClient = HttpClient::create();
        $this->debug = null;
    }

    /**
     * Init debugger.
     *
     * @param DebugAdapterInterface $debug
     *
     * @return void
     */
    public function initDebug(DebugAdapterInterface $debug)
    {
        $this->debug = $debug;
    }

    /**
     * Get client property value.
     *
     * @param $name
     *
     * @return mixed
     */
    public function getProperty($name)
    {
        return $this->{$name};
    }

    /**
     * Get ressource API.
     *
     * @see https://docs.nuclia.dev/docs/api#tag/Resources
     *
     * @return \Nuclia\Api\ResourcesApi
     */
    public function createResourcesApi(): ResourcesApi
    {
        return new ResourcesApi($this);
    }

    /**
     * Get resource fields API.
     *
     * @see https://docs.nuclia.dev/docs/api#tag/Resource-fields
     *
     * @return \Nuclia\Api\ResourceFieldsApi
     */
    public function createResourceFieldsApi(): ResourceFieldsApi
    {
        return new ResourceFieldsApi($this);
    }

    /**
     * Get search API.
     *
     * @see https://docs.nuclia.dev/docs/api#tag/Search
     *
     * @return \Nuclia\Api\SearchApi
     */
    public function createSearchApi(): SearchApi
    {
        return new SearchApi($this);
    }

    /**
     * Add a default http header that have to beadded to every requests.
     *
     * @param string $name
     *   Header name.
     * @param string $value
     *
     * @return void
     */
    public function addDefaultHeader(string $name, string $value)
    {
        $this->defaultHeaders[$name] = $value;
    }

    /**
     * Remove defaut HTTP header.
     *
     * @param string $name
     *   Header name.
     *
     * @return void
     */
    public function removeDefaultHeader(string $name)
    {
        unset($this->defaultHeaders[$name]);
    }

    /**
     * Return an array containing default headers.
     *
     * @return array
     */
    public function getDefaultHeaders()
    {
        return $this->defaultHeaders;
    }
}
