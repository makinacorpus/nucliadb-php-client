<?php

namespace Nuclia\EnumArray;

use Nuclia\Enum\ShowEnum;

class ShowEnumArray extends EnumArrayAbstract
{
    /**
     * @inerhitDoc
     */
    public function addValue($value)
    {
        return new ShowEnum($value);
    }
}
