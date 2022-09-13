<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'extracted' value.
 */
enum ExtractedEnum: string
{
    use EnumToArrayTrait;

    case TEXT = 'text';
    case METADATA = 'metadata';
    case LARGE_METADATA = 'large_metadata';
    case VECTORS = 'vectors';
    case LINK = 'link';
    case FILE = 'file';
}
