<?php

namespace Nuclia\Api;

use Nuclia\Enum\Enum;
use Nuclia\Enum\MethodEnum;
use Nuclia\Enum\RequestOptionsGroupEnum;
use Nuclia\Query\GetResourceQuery;
use Nuclia\RequestOptions\RequestOptions;
use Nuclia\RequestOptions\RequestOptionsGroup;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Resources API class that reflects Resources NucliaDB web API.
 *
 * @see https://docs.nuclia.dev/docs/api#tag/Resources
 */
class ResourcesApi extends ApiAbstract
{
    /**
     * Implement: Get Resource.
     *
     * @see   https://docs.nuclia.dev/docs/api#operation/Get_Resource_kb__kbid__resource__rid__get
     *
     * @param string $rid
     * @param GetResourceQuery $getResourceQuery
     *
     * @return ResponseInterface
     */
    public function getResource(string $rid, GetResourceQuery $getResourceQuery): ResponseInterface
    {
        $uri = $this->buildUrl('resource/%rid', ['%rid' => $rid]);
        $options = (new RequestOptions($this->apiClient))
            ->group(
                Enum::requestOptionsGroup(RequestOptionsGroupEnum::QUERY),
                $getResourceQuery->build()
            );
        return $this->request(Enum::method(MethodEnum::GET), $uri, $options->getArray());
    }

    /**
     * Implement: Create Resource.
     *
     * @see   https://docs.nuclia.dev/docs/api#operation/Create_Resource_kb__kbid__resources_post
     * @param array $body
     *
     * @return ResponseInterface
     */
    public function createResource(array $body): ResponseInterface
    {
        $uri = $this->buildUrl('resources');
        $options = (new RequestOptions($this->apiClient))
        ->group(
            Enum::requestOptionsGroup(RequestOptionsGroupEnum::HEADERS),
            (new RequestOptionsGroup())
              ->set('Content-Type', 'application/json')
        )
        ->group(
            Enum::requestOptionsGroup(RequestOptionsGroupEnum::BODY),
            (new RequestOptionsGroup($body))
              ->enableJsonMode()
        );

        return $this->request(Enum::method(MethodEnum::POST), $uri, $options->getArray());
    }

    /**
     * Implement: Delete Resource.
     *
     * @see   https://docs.nuclia.dev/docs/api#operation/Delete_Resource_kb__kbid__resource__rid__delete
     * @param string $rid
     *
     * @return ResponseInterface
     */
    public function deleteResource(string $rid): ResponseInterface
    {
        $uri = $this->buildUrl('resource/%rid', ['%rid' => $rid]);
        $options = (new RequestOptions($this->apiClient));
        return $this->request(Enum::method(MethodEnum::DELETE), $uri, $options->getArray());
    }

    /**
     * Implement: Modify Resource.
     *
     * @see   https://docs.nuclia.dev/docs/api#operation/Modify_Resource_kb__kbid__resource__rid__patch
     * @param string $rid
     * @param $body
     *
     * @return ResponseInterface
     */
    public function modifyResource(string $rid, $body): ResponseInterface
    {
        $uri = $this->buildUrl('resource/%rid', ['%rid' => $rid]);
        $options = (new RequestOptions($this->apiClient))
        ->group(
            Enum::requestOptionsGroup(RequestOptionsGroupEnum::HEADERS),
            (new RequestOptionsGroup())
              ->set('Content-Type', 'application/json')
        )
        ->group(
            Enum::requestOptionsGroup(RequestOptionsGroupEnum::BODY),
            (new RequestOptionsGroup($body))
              ->enableJsonMode()
        );
        return $this->request(Enum::method(MethodEnum::PATCH), $uri, $options->getArray());
    }
}
