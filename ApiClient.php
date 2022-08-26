<?php

namespace Nuclia;

use Nuclia\Api\ResourceFieldsApi;
use Nuclia\Api\ResourcesApi;
use Nuclia\Api\SearchApi;
use Symfony\Component\HttpClient\HttpClient;

class ApiClient
{
  const API_URI_TEMPLATE = '%protocol://%zone.%domain/%basepath/%kbid/%name';
  const API_PROTOCOL = 'https';
  const API_DOMAIN = 'nuclia.cloud';
  const API_BASEPATH = 'api/v1/kb';

  protected $zone;
  protected $token;
  protected $kbid;
  protected $httpClient;
  protected $debug;

  /**
   * Initialize Nuclia api client.
   * @param string $zone
   * @param string $token
   * @param string $kbid
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
   * @param DebugAdapterInterface $debug
   * @return void
   */
  public function initDebug(DebugAdapterInterface $debug)
  {
    $this->debug = $debug;
  }

  /**
   * Get client property value.
   * @param $name
   * @return mixed
   */
  public function getProperty($name)
  {
      return $this->{$name};
  }

  /**
   * Get ressource API.
   * @see https://docs.nuclia.dev/docs/api#tag/Resources
   * @return ResourcesApi
   */
  public function createResourcesApi(): ResourcesApi
  {
    return new ResourcesApi($this);
  }

  /**
   * Get resource fields API.
   * @see https://docs.nuclia.dev/docs/api#tag/Resource-fields
   * @return ResourceFieldsApi
   */
  public function createResourceFieldsApi(): ResourceFieldsApi
  {
    return new ResourceFieldsApi($this);
  }

  /**
   * Get search API.
   * @see https://docs.nuclia.dev/docs/api#tag/Search
   * @return SearchApi
   */
  public function createSearchApi(): SearchApi
  {
    return new SearchApi($this);
  }
}
