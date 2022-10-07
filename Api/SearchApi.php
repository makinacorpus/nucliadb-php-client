<?php

namespace Nuclia\Api;

use Nuclia\Enum\Enum;
use Nuclia\Enum\MethodEnum;
use Nuclia\Enum\RequestOptionsGroupEnum;
use Nuclia\Query\SearchQuery;
use Nuclia\RequestOptions\RequestOptions;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Resources API class that reflects Search NucliaDB web API.
 *
 * @see https://docs.nuclia.dev/docs/api#tag/Search
 */
class SearchApi extends ApiAbstract
{
    /**
     * Implement: Search Knowledgebox.
     *
     * @see   https://docs.nuclia.dev/docs/api#operation/search_knowledgebox_kb__kbid__search_get
     *
     * @param SearchQuery $searchQuery
     *
     * @return ResponseInterface
     */
    public function search(
        SearchQuery $searchQuery
    ): ResponseInterface {
        $uri = $this->buildUrl('search');
        $options = (new RequestOptions($this->apiClient))
            ->group(
                Enum::requestOptionsGroup(RequestOptionsGroupEnum::QUERY),
                $searchQuery->build()
            );
        return $this->request(Enum::method(MethodEnum::GET), $uri, $options->getArray());
    }
}
