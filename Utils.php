<?php

namespace Nuclia;

use Nuclia\Enum\EnumInterface;
use Nuclia\Enum\MethodEnum;
use Nuclia\EnumArray\EnumArrayInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Utils
{
  /**
   * Send a request to Nuclia web API and return the response.
   * @param string $method @see ApiClient::API_METHOD_* const
   * @param string $url
   * @param array $options
   * @return ResponseInterface
   */
  public static function request(MethodEnum $method, string $url, array $options = []): ResponseInterface
  {

    // Encode query string manually. @see https://stackoverflow.com/questions/60440737/symfony-httpclient-get-request-with-multiple-query-string-parameters-with-same-n
    if (key_exists('query', $options)) {
      $queryString = preg_replace('/%5B(?:[0-9]|[1-9][0-9]+)%5D=/', '=',
        http_build_query($options['query'], '', '&', \PHP_QUERY_RFC3986)
      );
      unset($options['query']);
      $url = sprintf('%s?%s', $url, $queryString);
    }

    if ($debug = ApiClient::getProperty('debug')) {
      $debug->debugRequest($method->getValue(), $url, $options);
    }

    $response = ApiClient::getProperty('httpClient')->request($method->getValue(), $url, $options);

    if ($debug = ApiClient::getProperty('debug')) {
      $debug->debugResponse($response);
    }
    return $response;
  }

  /**
   * Build Nuclia web API url.
   * @param string $serviceUrlPart
   * @return string
   */
  public static function buildUrl(string $serviceUrlPart, array $params = [])
  {
    return strtr(ApiClient::API_URI_TEMPLATE, [
      '%protocol' => ApiClient::API_PROTOCOL,
      '%zone' => ApiClient::getProperty('zone'),
      '%domain' => ApiClient::API_DOMAIN,
      '%basepath' => ApiClient::API_BASEPATH,
      '%kbid' => ApiClient::getProperty('kbid'),
      '%name' => strtr($serviceUrlPart, $params)
    ]);
  }

  /**
   * Get the values of an enum array if defined or null instead.
   * @param EnumArrayInterface|null $enumArray
   * @return array|null
   */
  public static function getEnumArrayValues(?EnumArrayInterface $enumArray)
  {
    if ($enumArray instanceof EnumArrayInterface) {
      return $enumArray->getValues();
    }
    return null;
  }

  /**
   * Get the value of an enum if defined or null instead.
   * @param EnumInterface|null $enum
   * @return array|EnumArrayInterface|null
   */
  public static function getEnumValue(?EnumInterface $enum)
  {
    if ($enum instanceof EnumInterface) {
      return $enum->getValue();
    }
    return null;
  }
}
