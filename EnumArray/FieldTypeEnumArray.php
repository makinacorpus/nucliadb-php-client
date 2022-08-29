<?php

namespace Nuclia\EnumArray;

use Nuclia\Enum\FieldTypeEnum;

class FieldTypeEnumArray extends EnumArrayAbstract
{
    /**
     * @inerhitDoc
     */
    public function addValue($value)
    {
        return new FieldTypeEnum($value);
    }
}
