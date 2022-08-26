<?php

namespace Nuclia\Enum;

class SortEnum extends EnumAbstract
{
  const MODIFIED = 'modified';
  const CREATED = 'created';

  /**
   * @inerhitDoc
   */
  public function getAllowedValues(): array
  {
    return [
      self::MODIFIED,
      self::CREATED
    ];
  }

}
