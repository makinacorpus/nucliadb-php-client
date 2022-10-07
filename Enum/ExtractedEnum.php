<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'extracted' value.
 */
class ExtractedEnum extends EnumAbstract
{
    public const TEXT = 'text';
    public const METADATA = 'metadata';
    public const LARGE_METADATA = 'large_metadata';
    public const VECTORS = 'vectors';
    public const LINK = 'link';
    public const FILE = 'file';

    /**
     * @inerhitDoc
     */
    public function getAllowedValues(): array
    {
        return [
        self::TEXT,
        self::METADATA,
        self::LARGE_METADATA,
        self::VECTORS,
        self::LINK,
        self::FILE,
        ];
    }
}
