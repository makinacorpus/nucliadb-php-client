<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'show' value.
 */
class ShowEnum extends EnumAbstract
{
    public const BASIC = 'basic';
    public const ORIGIN = 'origin';
    public const RELATION = 'relations';
    public const VALUES = 'values';
    public const EXTRACTED = 'extracted';
    public const ERROR = 'errors';

    /**
     * @inerhitDoc
     */
    public function getAllowedValues(): array
    {
        return [
        self::BASIC,
        self::ORIGIN,
        self::RELATION,
        self::VALUES,
        self::EXTRACTED,
        self::ERROR,
        ];
    }
}
