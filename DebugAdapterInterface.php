<?php

namespace Nuclia;

/**
 * Debug adapter interface
 */
interface DebugAdapterInterface
{
    /**
     *
     */
    public function debugRequest(string $method, string $url, array $options);

    /**
     *
     */
    public function debugResponse($response);
}
