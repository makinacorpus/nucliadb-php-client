<?php

namespace Nuclia\RequestOptions;

abstract class RequestOptionsAbstract
{
    protected $values;

    /**
     * Constructor.
     * @param $defaultValues
     */
    public function __construct($defaultValues = [])
    {
        $this->values = $defaultValues;
    }

    /**
     * Set a value.
     * @param string $key
     * @param $value
     * @return $this
     */
    public function set(string $key, $value = null)
    {
        if ($value !== null) {
            $this->values[$key] = $value;
        }
        return $this;
    }

    /**
     * Get array of values contained in the RequestOption and its possible nested RequestOption.
     * @return array|mixed
     */
    public function getArray()
    {
        $output = $this->values;
        array_walk($output, function (&$value) {
            if ($value instanceof RequestOptionsAbstract) {
                $value = $value->getArray();
            }
        });

        return $output;
    }
}
