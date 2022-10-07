<?php

namespace Nuclia\Enum;

/**
 * Enum class for 'method' value.
 */
class MethodEnum extends EnumAbstract
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const DELETE = 'DELETE';
    public const PATCH = 'PATCH';

    /**
     * @inerhitDoc
     */
    public function getAllowedValues(): array
    {
        return [
        self::GET,
        self::POST,
        self::DELETE,
        self::PATCH,
        ];
    }
}
