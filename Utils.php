<?php

namespace Nuclia;

use Nuclia\Enum\EnumInterface;
use Nuclia\EnumArray\EnumArrayInterface;

/**
 * Utility class.
 */
class Utils
{
    /**
     * Get the values of an enum array if defined or null instead.
     *
     * @param \Nuclia\EnumArray\EnumArrayInterface|null $enumArray
     *
     * @return array|null
     */
    public static function getEnumArrayValues(?EnumArrayInterface $enumArray)
    {
        if ($enumArray instanceof EnumArrayInterface) {
            return $enumArray->getValues();
        }
        return null;
    }

    /**
     * Get the value of an enum if defined or null instead.
     *
     * @param \Nuclia\Enum\EnumInterface|null $enum
     *
     * @return array|EnumArrayInterface|null
     */
    public static function getEnumValue(?EnumInterface $enum)
    {
        if ($enum instanceof EnumInterface) {
            return $enum->getValue();
        }
        return null;
    }
}
