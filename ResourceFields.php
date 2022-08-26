<?php

namespace Nuclia;

use Nuclia\Enum\Enum;
use Nuclia\Enum\MethodEnum;
use Nuclia\RequestOptions\RequestOptions;
use Nuclia\RequestOptions\RequestOptionsGroup;

class ResourceFields
{

  /**
   * Implement: Upload Binary File.
   * @see https://docs.nuclia.dev/docs/api#operation/Upload_binary_file_kb__kbid__resource__path_rid__file__field__upload_post
   * @param string $rid
   * @param string $fieldId
   * @param string $body
   * @return \Symfony\Contracts\HttpClient\ResponseInterface
   */
  public static function uploadBinaryFile(string $rid, string $fieldId, string $body){
    $uri = Utils::buildUrl('resource/%rid/file/%field/upload', [
      '%rid' => $rid,
      '%field' => $fieldId
    ]);
    $options = (new RequestOptions())
      ->group('headers', (new RequestOptionsGroup())
        ->set('Content-Type', 'multipart/form-data')
      )
      ->set('body', $body);
    return Utils::request(Enum::method(MethodEnum::POST), $uri, $options->getArray());
  }
}
