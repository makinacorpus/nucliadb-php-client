<?php

namespace Nuclia\Enum;

class ShowEnum extends EnumAbstract
{
  const BASIC = 'basic';
  const ORIGIN = 'origin';
  const RELATION = 'relations';
  const VALUES = 'values';
  const EXTRACTED = 'extracted';
  const ERROR = 'errors';

  /**
   * @inerhitDoc
   */
  public function getAllowedValues(): array
  {
    return [
      self::BASIC,
      self::ORIGIN,
      self::RELATION,
      self::VALUES,
      self::EXTRACTED,
      self::ERROR
    ];
  }

}
