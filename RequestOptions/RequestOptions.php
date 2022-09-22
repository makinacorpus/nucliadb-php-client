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
     * @param RequestOptionsGroupEnum $group
     * @param RequestOptionsGroup $subset
     *
     * @return $this
     */
    public function group(RequestOptionsGroupEnum $group, RequestOptionsGroup $subset): static
    {
        if (!key_exists($group->value, $this->values)) {
            $this->values[$group->value] = new RequestOptionsGroup();
        }

        foreach ($subset->getRaw() as $subKey => $subItem) {
            $this->values[$group->value]->set($subKey, $subItem);
        }
        if ($subset->getJsonMode()) {
            $this->values[$group->value]->enableJsonMode();
        } else {
            $this->values[$group->value]->disableJsonMode();
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
