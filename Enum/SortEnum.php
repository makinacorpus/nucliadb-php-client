<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'sort' value.
 */
enum SortEnum: string
{
    use EnumToArrayTrait;

    case MODIFIED = 'modified';
    case CREATED = 'created';
}
