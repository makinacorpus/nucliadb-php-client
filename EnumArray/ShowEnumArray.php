<?php

namespace Nuclia\EnumArray;

use Nuclia\Enum\ShowEnum;

/**
 * Enum array class for 'show' value.
 */
class ShowEnumArray extends EnumArrayAbstract
{
    /**
     * @inerhitDoc
     */
    public function testValue(ShowEnum $value)
    {
        return $value;
    }
}
