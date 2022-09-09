<?php

namespace Nuclia\RequestOptions;

/**
 * Request options group.
 */
class RequestOptionsGroup extends RequestOptionsAbstract
{
    protected $jsonMode;

    /**
     * @inerhitDoc
     */
    public function __construct($defaultValues = [])
    {
        parent::__construct($defaultValues);
        $this->jsonMode = false;
    }

    /**
     * @inerhitDoc
     */
    public function getArray()
    {
        return $this->jsonMode
          ? json_encode(parent::getArray())
          : parent::getArray();
    }

    /**
     * Enable json mode.
     * Enabled json mode will produce a json encoded array instead of a simple array on getArray method call.
     *
     * @return $this
     */
    public function enableJsonMode()
    {
        $this->jsonMode = true;
        return $this;
    }

    /**
     * Disable json mode.
     *
     * @return $this
     */
    public function disableJsonMode()
    {
        $this->jsonMode = false;
        return $this;
    }

    /**
     * Get Json mode state.
     *
     * @return false
     */
    public function getJsonMode()
    {
        return $this->jsonMode;
    }

    /**
     * Get raw values.
     *
     * @return array|mixed
     */
    public function getRaw()
    {
        return $this->values;
    }
}
