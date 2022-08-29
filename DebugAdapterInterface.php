<?php

namespace Nuclia;

interface DebugAdapterInterface
{
    public function debugRequest(string $method, string $url, array $options);

    public function debugResponse($response);
}
