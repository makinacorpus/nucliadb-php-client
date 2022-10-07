<?php

namespace Nuclia\Query;

use LogicException;
use Nuclia\Enum\SortEnum;
use Nuclia\RequestOptions\RequestOptionsGroup;
use Nuclia\Utils;

class SearchQuery
{
    /**
     * Query.
     * @var string|null
     */
    protected ?string $query;

    /**
     * Sort.
     * @var SortEnum|null
     */
    protected ?SortEnum $sort;

    /**
     * Page number.
     * @var int|null
     */
    protected ?int $pageNumber;

    /**
     * Page size.
     * @var int|null
     */
    protected ?int $pageSize;

    /**
     * Shards.
     * @var array
     */
    protected array $shards;

    public function __construct()
    {
        $this->query = null;
        $this->sort = null;
        $this->pageNumber = null;
        $this->pageSize = null;
        $this->shards = [];
    }

    /**
     * Set query.
     *
     * @param string|null $query
     *
     * @return $this
     */
    public function setQuery(?string $query): SearchQuery
    {
        $this->query = $query;
        return $this;
    }

    /**
     * Set sort.
     *
     * @param SortEnum|null $sort
     *
     * @return $this
     */
    public function setSort(?SortEnum $sort): SearchQuery
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * Set pageNumber.
     *
     * @param int|null $pageNumber
     *
     * @return $this
     */
    public function setPageNumber(?int $pageNumber): SearchQuery
    {
        $this->pageNumber = $pageNumber;
        return $this;
    }

    /**
     * Set pageSize.
     *
     * @param int|null $pageSize
     *
     * @return $this
     */
    public function setPageSize(?int $pageSize): SearchQuery
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * Set shards.
     *
     * @param array|null $shards
     *
     * @return $this
     */
    public function setShards(?array $shards): SearchQuery
    {
        $this->shards = $shards;
        return $this;
    }

    /**
     * Build query.
     *
     * @return RequestOptionsGroup
     */
    public function build(): RequestOptionsGroup
    {
        if ($this->query === null) {
            throw new LogicException('"query" parameter must be defined.');
        }
        return (new RequestOptionsGroup())
          ->set('query', $this->query)
          ->set('sort', Utils::getEnumValue($this->sort))
          ->set('page_number', $this->pageNumber)
          ->set('page_size', $this->pageSize)
          ->set('shards', $this->shards);
    }
}
