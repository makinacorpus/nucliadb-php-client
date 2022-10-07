<?php

namespace Nuclia\EnumArray;

use Nuclia\Enum\ExtractedEnum;

/**
 * Enum array class for 'extracted' value.
 */
class ExtractedEnumArray extends EnumArrayAbstract
{
    /**
     * @inerhitDoc
     */
    public function testValue(ExtractedEnum $value): ExtractedEnum
    {
        return $value;
    }
}
