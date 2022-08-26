<?php

namespace Nuclia;

use http\Client\Response;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ApiClient
{
  const API_URI_TEMPLATE = '%protocol://%zone.%domain/%basepath/%kbid/%name';
  const API_PROTOCOL = 'https';
  const API_DOMAIN = 'nuclia.cloud';
  const API_BASEPATH = 'api/v1/kb';

  protected static $isInit;
  protected static $zone;
  protected static $token;
  protected static $kbid;
  protected static $httpClient;
  protected static $debug;

  /**
   * Initialize Nuclia api client.
   * @param string $zone
   * @param string $token
   * @param string $kbid
   * @return void
   */
  public static function init(string $zone, string $token, string $kbid)
  {
    self::$isInit = true;
    self::$zone = $zone;
    self::$token = $token;
    self::$kbid = $kbid;
    self::$httpClient = HttpClient::create();
    self::$debug = null;
  }

  /**
   * Init debugger.
   * @param DebugAdapterInterface $debug
   * @return void
   */
  public static function initDebug(DebugAdapterInterface $debug)
  {
    self::$debug = $debug;
  }

  /**
   * Get client property value.
   * @param $name
   * @return mixed
   */
  public static function getProperty($name)
  {
    if (self::$isInit) {
      return self::$$name;
    }
    throw new \LogicException('Nuclia API client not initialized.');
  }

}
