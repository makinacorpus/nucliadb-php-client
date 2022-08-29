<?php

namespace Nuclia\EnumArray;

interface EnumArrayInterface
{
    /**
     * Constructor. Set array of values and check each one is an allowed value.
     * @param string $value
     */
    public function __construct(array $values);

    /**
     * Add a value into array.
     * @param $value
     * @return mixed
     */
    public function addValue($value);

    /**
     * Get array values.
     * @return array
     */
    public function getValues(): array;
}
