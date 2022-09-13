<?php

namespace Nuclia\Enum;

trait EnumToArrayTrait
{
    public static function names(): array
    {
        return array_column(static::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }
}
