<?php

namespace Nuclia\Api;

use Nuclia\Enum\EnumRepository;
use Nuclia\Enum\MethodEnum;
use Nuclia\Enum\SortEnum;
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
     * @param string                     $query
     * @param \Nuclia\Enum\SortEnum|null $sort
     * @param int|null                   $pageNumber
     * @param int|null                   $pageSize
     *
     * @return \Symfony\Contracts\HttpClient\ResponseInterface
     */
    public function search(string $query, ?SortEnum $sort = null, ?int $pageNumber = null, ?int $pageSize = null): ResponseInterface
    {
        $uri = $this->buildUrl('search');
        $options = (new RequestOptions($this->apiClient))
        ->group(
            'query',
            (new RequestOptionsGroup())
                ->set('query', $query)
                ->set('sort', Utils::getEnumValue($sort))
                ->set('page_number', $pageNumber)
                ->set('page_size', $pageSize)
        );
        return $this->request(EnumRepository::method(MethodEnum::GET), $uri, $options->getArray());
    }
}
