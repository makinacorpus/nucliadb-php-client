<?php

namespace Nuclia\Headers;

use Nuclia\RequestOptions\RequestOptionsGroup;

class UploadBinaryFileHeaders
{
    /**
     * X-MD5 Header.
     *
     * @var string|null
     */
    protected ?string $md5;

    public function __construct()
    {
        $this->md5 = null;
    }

    /**
     * @param string $md5
     *
     * @return $this
     */
    public function setMd5(string $md5): UploadBinaryFileHeaders
    {
        $this->md5 = $md5;
        return $this;
    }

    /**
     * @return string
     */
    public function getMd5(): string
    {
        return $this->md5;
    }

    /**
     * Build headers.
     *
     * @return RequestOptionsGroup
     */
    public function build(): RequestOptionsGroup
    {
        return  (new RequestOptionsGroup())
          ->set('X-MD5', $this->md5)

          // Always add this header for Upload-Binary-File request.
          ->set('Content-Type', 'multipart/form-data');
    }
}
