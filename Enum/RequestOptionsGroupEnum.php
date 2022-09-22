<?php

namespace Nuclia\Enum;

/**
 * Enum for 'method' value.
 */
enum RequestOptionsGroupEnum: string
{
    case QUERY = 'query';
    case HEADERS = 'headers';
    case BODY = 'body';
}
