<?php

namespace Nuclia;


use Nuclia\Enum\Enum;
use Nuclia\Enum\MethodEnum;
use Nuclia\Enum\SortEnum;
use Nuclia\RequestOptions\RequestOptions;
use Nuclia\RequestOptions\RequestOptionsGroup;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Search
{

  /**
   * Implement: Search Knowledgebox.
   * @see https://docs.nuclia.dev/docs/api#operation/search_knowledgebox_kb__kbid__search_get
   * @param string $query
   * @param SortEnum|null $sort
   * @param int|null $pageNumber
   * @param int|null $pageSize
   * @return ResponseInterface
   */
  public static function search(string $query, ?SortEnum $sort = null, ?int $pageNumber = null, ?int $pageSize = null): ResponseInterface
  {
    $uri = Utils::buildUrl('search');
    $options = (new RequestOptions())
      ->group('query', (new RequestOptionsGroup())
        ->set('query', $query)
        ->set('sort', Utils::getEnumValue($sort))
        ->set('page_number', $pageNumber)
        ->set('page_size', $pageSize)
      );
    return Utils::request(Enum::method(MethodEnum::GET), $uri, $options->getArray());
  }

}
