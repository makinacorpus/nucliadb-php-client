<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'format' value.
 */
class FormatEnum extends EnumAbstract
{
    public const PLAIN = 'PLAIN';
    public const HTML = 'HTML';
    public const RST = 'RST';
    public const MARKDOWN = 'MARKDOWN';

    /**
     * @inerhitDoc
     */
    public function getAllowedValues(): array
    {
        return [
        self::PLAIN,
        self::HTML,
        self::RST,
        self::MARKDOWN,
        ];
    }
}
