<?php

namespace Nuclia\Api;

use Nuclia\Enum\MethodEnum;
use Nuclia\EnumArray\ExtractedEnumArray;
use Nuclia\EnumArray\FieldTypeEnumArray;
use Nuclia\EnumArray\ShowEnumArray;
use Nuclia\RequestOptions\RequestOptions;
use Nuclia\RequestOptions\RequestOptionsGroup;
use Nuclia\Utils;
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
     * @param string                                    $rid
     * @param \Nuclia\EnumArray\ShowEnumArray|null      $show
     * @param \Nuclia\EnumArray\FieldTypeEnumArray|null $fieldType
     * @param \Nuclia\EnumArray\ExtractedEnumArray|null $extracted
     *
     * @return \Symfony\Contracts\HttpClient\ResponseInterface
     */
    public function getResource(string $rid, ShowEnumArray $show = null, FieldTypeEnumArray $fieldType = null, ExtractedEnumArray $extracted = null): ResponseInterface
    {
        $uri = $this->buildUrl('resource/%rid', ['%rid' => $rid]);
        $options = (new RequestOptions($this->apiClient))
        ->group(
            'query',
            (new RequestOptionsGroup())
                ->set('show', Utils::getEnumArrayValues($show))
                ->set('field_type', Utils::getEnumArrayValues($fieldType))
                ->set('extracted', Utils::getEnumArrayValues($extracted))
        );
        return $this->request(MethodEnum::GET, $uri, $options->getArray());
    }

    /**
     * Implement: Create Resource.
     *
     * @see   https://docs.nuclia.dev/docs/api#operation/Create_Resource_kb__kbid__resources_post
     * @param array $body
     *
     * @return \Symfony\Contracts\HttpClient\ResponseInterface
     */
    public function createResource(array $body): ResponseInterface
    {
        $uri = $this->buildUrl('resources');
        $options = (new RequestOptions($this->apiClient))
        ->group(
            'headers',
            (new RequestOptionsGroup())
              ->set('Content-Type', 'application/json')
        )
        ->group(
            'body',
            (new RequestOptionsGroup($body))
              ->enableJsonMode()
        );

        return $this->request(MethodEnum::POST, $uri, $options->getArray());
    }

    /**
     * Implement: Delete Resource.
     *
     * @see   https://docs.nuclia.dev/docs/api#operation/Delete_Resource_kb__kbid__resource__rid__delete
     * @param string $rid
     *
     * @return \Symfony\Contracts\HttpClient\ResponseInterface
     */
    public function deleteResource(string $rid): ResponseInterface
    {
        $uri = $this->buildUrl('resource/%rid', ['%rid' => $rid]);
        $options = (new RequestOptions($this->apiClient));
        return $this->request(MethodEnum::DELETE, $uri, $options->getArray());
    }

    /**
     * Implement: Modify Resource.
     *
     * @see   https://docs.nuclia.dev/docs/api#operation/Modify_Resource_kb__kbid__resource__rid__patch
     * @param string $rid
     * @param $body
     *
     * @return \Symfony\Contracts\HttpClient\ResponseInterface
     */
    public function modifyResource(string $rid, $body): ResponseInterface
    {
        $uri = $this->buildUrl('resource/%rid', ['%rid' => $rid]);
        $options = (new RequestOptions($this->apiClient))
        ->group(
            'headers',
            (new RequestOptionsGroup())
              ->set('Content-Type', 'application/json')
        )
        ->group(
            'body',
            (new RequestOptionsGroup($body))
              ->enableJsonMode()
        );
        return $this->request(MethodEnum::PATCH, $uri, $options->getArray());
    }
}
