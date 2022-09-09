<?php

namespace Nuclia\RequestOptions;

use Nuclia\ApiClient;

/**
 * Request options.
 */
class RequestOptions extends RequestOptionsAbstract
{
    /**
     * Api client.
     *
     * @var \Nuclia\ApiClientApiClient
     */
    protected ApiClient $apiClient;

    /**
     * @inerhitDoc
     *
     * @param \Nuclia\ApiClient $apiClient
     */
    public function __construct(ApiClient $apiClient)
    {
        parent::__construct();
        $this->apiClient = $apiClient;
        $this->values['headers'] = (new RequestOptionsGroup())
            ->set('X-STF-Serviceaccount', 'Bearer ' . $apiClient->getProperty('token'));
    }

    /**
     * Add a RequestOptionsGroup inside the current RequestOptions.
     *
     * @param string              $key
     * @param RequestOptionsGroup $subset
     *
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
        if ($subset->getJsonMode()) {
            $this->values[$key]->enableJsonMode();
        } else {
            $this->values[$key]->disableJsonMode();
        }

        return $this;
    }

    /**
     * Get Api client.
     *
     * @return \Nuclia\ApiClient
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }
}
