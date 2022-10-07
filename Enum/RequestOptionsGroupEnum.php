<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'method' value.
 */
class RequestOptionsGroupEnum extends EnumAbstract
{
    public const QUERY = 'query';
    public const HEADERS = 'headers';
    public const BODY = 'body';

    /**
     * @inerhitDoc
     */
    public function getAllowedValues(): array
    {
        return [
          self::QUERY,
          self::HEADERS,
          self::BODY,
        ];
    }
}
