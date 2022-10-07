<?php

namespace Nuclia;

use Nuclia\Enum\EnumAbstract;
use Nuclia\EnumArray\EnumArrayAbstract;

/**
 * Utility class.
 */
class Utils
{
    /**
     * Get the values of an enum array if defined or null instead.
     *
     * @param EnumArrayAbstract|null $enumArray
     *
     * @return array|null
     */
    public static function getEnumArrayValues(?EnumArrayAbstract $enumArray): ?array
    {
        if ($enumArray instanceof EnumArrayAbstract) {
            return $enumArray->getValues();
        }
        return null;
    }

    /**
     * Get the value of an enum if defined or null instead.
     *
     * @param EnumAbstract|null $enum
     *
     * @return string|null
     */
    public static function getEnumValue(?EnumAbstract $enum): ?string
    {
        if ($enum instanceof EnumAbstract) {
            return $enum->getValue();
        }
        return null;
    }
}
