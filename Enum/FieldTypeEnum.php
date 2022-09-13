<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'field_type' value.
 */
enum FieldTypeEnum: string
{
    use EnumToArrayTrait;

    case TEXT = 'text';
    case FILE = 'file';
    case LINK = 'link';
    case LAYOUT = 'layout';
    case CONVERSATION = 'conversation';
    case KEYWORDSET = 'keywordset';
    case DATETIME = 'datetime';
    case GENERIC = 'generic';
}
