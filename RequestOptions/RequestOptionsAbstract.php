<?php

namespace Nuclia\RequestOptions;

/**
 * Abstract base class for request options classes.
 */
abstract class RequestOptionsAbstract
{
    protected $values;

    /**
     * Constructor.
     *
     * @param $defaultValues
     */
    public function __construct($defaultValues = [])
    {
        $this->values = $defaultValues;
    }

    /**
     * Set a value.
     *
     * @param string $key
     * @param $value
     *
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
     *
     * @return array|mixed
     */
    public function getArray()
    {
        $output = $this->values;
        array_walk(
            $output,
            function (&$value, $key) {
                if ($value instanceof RequestOptionsAbstract) {
                    $valueArray = $value->getArray();

                    // Append default headers.
                    if ($key === 'headers' && $this instanceof RequestOptions) {
                        /**
             * @var RequestOptions $thisOptions
                  */
                        $thisOptions = $this;
                        $valueArray += $thisOptions->getApiClient()->getDefaultHeaders();
                    }

                    $value = $valueArray;
                }
            }
        );

        return $output;
    }
}
