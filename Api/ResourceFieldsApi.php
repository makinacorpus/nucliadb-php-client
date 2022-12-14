<?php

namespace Nuclia\Api;

use Nuclia\Enum\Enum;
use Nuclia\Enum\MethodEnum;
use Nuclia\Enum\RequestOptionsGroupEnum;
use Nuclia\Headers\UploadBinaryFileHeaders;
use Nuclia\RequestOptions\RequestOptions;
use Nuclia\RequestOptions\RequestOptionsGroup;
use Symfony\Contracts\HttpClient\ResponseInterface;

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
     * @return ResponseInterface
     */
    public function uploadBinaryFile(string $rid, string $fieldId, string $body, ?UploadBinaryFileHeaders $headers=null): ResponseInterface
    {
        $uri = $this->buildUrl(
            'resource/%rid/file/%field/upload',
            [
            '%rid' => $rid,
            '%field' => $fieldId,
            ]
        );

        // Create an empty set of headers that will generate default headers when built.
        if ($headers === null) {
            $headers = new UploadBinaryFileHeaders();
        }
        $options = (new RequestOptions($this->apiClient))
        ->group(
            Enum::requestOptionsGroup(RequestOptionsGroupEnum::HEADERS),
            ($headers->build())
        )
        ->set('body', $body);
        return $this->request(Enum::method(MethodEnum::POST), $uri, $options->getArray());
    }
}
