<?php

namespace Nuclia\RequestOptions;

use Nuclia\ApiClient;
use Nuclia\Enum\RequestOptionsGroupEnum;

/**
 * Request options.
 */
class RequestOptions extends RequestOptionsAbstract
{
    /**
     * Api client.
     *
     * @var ApiClient
     */
    protected ApiClient $apiClient;

    /**
     * @inerhitDoc
     *
     * @param ApiClient $apiClient
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
     * @param RequestOptionsGroupEnum $group
     * @param RequestOptionsGroup $subset
     *
     * @return $this
     */
    public function group(RequestOptionsGroupEnum $group, RequestOptionsGroup $subset): RequestOptions
    {
        $groupValue = $group->value;
        if (!key_exists($groupValue, $this->values)) {
            $this->values[$groupValue] = new RequestOptionsGroup();
        }

        foreach ($subset->getRaw() as $subKey => $subItem) {
            $this->values[$groupValue]->set($subKey, $subItem);
        }
        if ($subset->getJsonMode()) {
            $this->values[$groupValue]->enableJsonMode();
        } else {
            $this->values[$groupValue]->disableJsonMode();
        }

        return $this;
    }

    /**
     * Get Api client.
     *
     * @return ApiClient
     */
    public function getApiClient(): ApiClient
    {
        return $this->apiClient;
    }
}
