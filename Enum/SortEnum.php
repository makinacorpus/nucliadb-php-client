<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'sort' value.
 */
class SortEnum extends EnumAbstract
{
    public const MODIFIED = 'modified';
    public const CREATED = 'created';

    /**
     * @inerhitDoc
     */
    public function getAllowedValues(): array
    {
        return [
        self::MODIFIED,
        self::CREATED,
        ];
    }
}
