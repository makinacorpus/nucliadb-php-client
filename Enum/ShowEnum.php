<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'show' value.
 */
enum ShowEnum: string
{
    use EnumToArrayTrait;

    case BASIC = 'basic';
    case ORIGIN = 'origin';
    case RELATION = 'relations';
    case VALUES = 'values';
    case EXTRACTED = 'extracted';
    case ERROR = 'errors';
}
