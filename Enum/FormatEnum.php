<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'format' value.
 */
enum FormatEnum: string
{
    use EnumToArrayTrait;

    case PLAIN = 'PLAIN';
    case HTML = 'HTML';
    case RST = 'RST';
    case MARKDOWN = 'MARKDOWN';
}
