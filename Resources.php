<?php

namespace Nuclia;

use Nuclia\Enum\Enum;
use Nuclia\Enum\MethodEnum;
use Nuclia\EnumArray\ExtractedEnumArray;
use Nuclia\EnumArray\FieldTypeEnumArray;
use Nuclia\EnumArray\ShowEnumArray;
use Nuclia\RequestOptions\RequestOptions;
use Nuclia\RequestOptions\RequestOptionsGroup;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Resources
{

  /**
   * Implement: Get Resource.
   * @see https://docs.nuclia.dev/docs/api#operation/Get_Resource_kb__kbid__resource__rid__get
   * @param string $rid
   * @param ShowEnumArray|null $show
   * @return ResponseInterface
   */
  public static function getResource(string $rid, ShowEnumArray $show = null, FieldTypeEnumArray $fieldType = null, ExtractedEnumArray $extracted = null): ResponseInterface
  {
    $uri = Utils::buildUrl('resource/%rid', ['%rid' => $rid]);
    $options = (new RequestOptions())
      ->group('query', (new RequestOptionsGroup())
        ->set('show', Utils::getEnumArrayValues($show))
        ->set('field_type', Utils::getEnumArrayValues($fieldType))
        ->set('extracted', Utils::getEnumArrayValues($extracted))
      );
    return Utils::request(Enum::method(MethodEnum::GET), $uri, $options->getArray());
  }

  /**
   * Implement: Create Resource.
   * @see https://docs.nuclia.dev/docs/api#operation/Create_Resource_kb__kbid__resources_post
   * @param array $body
   * @return ResponseInterface
   */
  public static function createResource(array $body): ResponseInterface
  {
    $uri = Utils::buildUrl('resources');
    $options = (new RequestOptions())
      ->group('headers', (new RequestOptionsGroup())
        ->set('Content-Type', 'application/json')
      )
      ->group('body', (new RequestOptionsGroup($body))
        ->enableJsonMode()
      );

    return Utils::request(Enum::method(MethodEnum::POST), $uri, $options->getArray());
  }

  /**
   * Implement: Delete Resource
   * @see https://docs.nuclia.dev/docs/api#operation/Delete_Resource_kb__kbid__resource__rid__delete
   * @param string $rid
   * @return ResponseInterface
   */
  public static function deleteResource(string $rid){
    $uri = Utils::buildUrl('resource/%rid', ['%rid' => $rid]);
    $options = (new RequestOptions());
    return Utils::request(Enum::method(MethodEnum::DELETE), $uri, $options->getArray());
  }

  /**
   * Implement: Modify Resource.
   * @see https://docs.nuclia.dev/docs/api#operation/Modify_Resource_kb__kbid__resource__rid__patch
   * @param string $rid
   * @param $body
   * @return ResponseInterface
   */
  public static function modifyResource(string $rid, $body){
    $uri = Utils::buildUrl('resource/%rid', ['%rid' => $rid]);
    $options = (new RequestOptions())
      ->group('headers', (new RequestOptionsGroup())
        ->set('Content-Type', 'application/json')
      )
      ->group('body', (new RequestOptionsGroup($body))
        ->enableJsonMode()
      );
    return Utils::request(Enum::method(MethodEnum::PATCH), $uri, $options->getArray());
  }
}
