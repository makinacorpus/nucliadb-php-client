<?php

namespace Nuclia\Enum;

class MethodEnum extends EnumAbstract
{
  const GET = 'GET';
  const POST = 'POST';
  const DELETE = 'DELETE';
  const PATCH = 'PATCH';

  /**
   * @inerhitDoc
   */
  public function getAllowedValues(): array
  {
    return [
      self::GET,
      self::POST,
      self::DELETE,
      self::PATCH
    ];
  }

}
