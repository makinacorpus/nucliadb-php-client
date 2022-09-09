<?php

namespace Nuclia\Api;

use Nuclia\Enum\Enum;
use Nuclia\Enum\MethodEnum;
use Nuclia\RequestOptions\RequestOptions;
use Nuclia\RequestOptions\RequestOptionsGroup;

/**
 * Resources API class that reflects Resource Fields NucliaDB web API.
 *
 * @see https://docs.nuclia.dev/docs/api#tag/Resource-fields
 */
class ResourceFieldsApi extends ApiAbstract
{
    /**
     * Implement: Upload Binary File.
     *
     * @see   https://docs.nuclia.dev/docs/api#operation/Upload_binary_file_kb__kbid__resource__path_rid__file__field__upload_post
     * @param string $rid
     * @param string $fieldId
     * @param string $body
     *
     * @return \Symfony\Contracts\HttpClient\ResponseInterface
     */
    public function uploadBinaryFile(string $rid, string $fieldId, string $body)
    {
        $uri = $this->buildUrl(
            'resource/%rid/file/%field/upload',
            [
            '%rid' => $rid,
            '%field' => $fieldId,
            ]
        );
        $options = (new RequestOptions($this->apiClient))
        ->group(
            'headers',
            (new RequestOptionsGroup())
              ->set('Content-Type', 'multipart/form-data')
        )
        ->set('body', $body);
        return $this->request(Enum::method(MethodEnum::POST), $uri, $options->getArray());
    }
}
