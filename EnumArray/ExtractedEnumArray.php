<?php

namespace Nuclia\EnumArray;

use Nuclia\Enum\ExtractedEnum;

class ExtractedEnumArray extends EnumArrayAbstract
{
  /**
   * @inerhitDoc
   */
  public function addValue($value)
  {
    return new ExtractedEnum($value);
  }
}
