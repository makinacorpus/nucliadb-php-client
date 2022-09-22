<?php

namespace Nuclia\Api;

use Nuclia\Enum\MethodEnum;
use Nuclia\Enum\RequestOptionsGroupEnum;
use Nuclia\Enum\SortEnum;
use Nuclia\Query\SearchQuery;
use Nuclia\RequestOptions\RequestOptions;
use Nuclia\RequestOptions\RequestOptionsGroup;
use Nuclia\Utils;
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
                RequestOptionsGroupEnum::QUERY,
                $searchQuery->build()
            );
        return $this->request(MethodEnum::GET, $uri, $options->getArray());
    }
}
