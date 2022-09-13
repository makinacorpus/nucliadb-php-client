<?php

namespace Nuclia\Enum;

/**
 * Enum for 'method' value.
 */
enum MethodEnum: string
{
    use EnumToArrayTrait;

    case GET = 'GET';
    case POST = 'POST';
    case DELETE = 'DELETE';
    case PATCH = 'PATCH';
}
