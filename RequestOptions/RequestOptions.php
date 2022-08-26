<?php

namespace Nuclia\RequestOptions;

use Nuclia\ApiClient;

class RequestOptions extends RequestOptionsAbstract
{
  /**
   * @inerhitDoc
   */
  public function __construct()
  {
    parent::__construct();
    $this->values['headers'] = (new RequestOptionsGroup())
      ->set('X-STF-Serviceaccount', 'Bearer ' . ApiClient::getProperty('token'));
  }

  /**
   * Add a RequestOptionsGroup inside the current RequestOptions.
   * @param string $key
   * @param RequestOptionsGroup $subset
   * @return $this
   */
  public function group(string $key, RequestOptionsGroup $subset)
  {
    if (!key_exists($key, $this->values)) {
      $this->values[$key] = new RequestOptionsGroup();
    }

    foreach ($subset->getRaw() as $subkey => $subitem) {
      $this->values[$key]->set($subkey, $subitem);
    }
    $this->values[$key]->enableJsonMode($subset->getJsonMode());
    return $this;
  }

}
