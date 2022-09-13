<?php

namespace Nuclia\EnumArray;

use Nuclia\Enum\FieldTypeEnum;

/**
 * Enum array class for 'field_type' value.
 */
class FieldTypeEnumArray extends EnumArrayAbstract
{
    /**
     * @inerhitDoc
     */
    public function testValue(FieldTypeEnum $value)
    {
        return $value;
    }
}
