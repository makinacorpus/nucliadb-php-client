<?php

namespace Nuclia\EnumArray;

use Nuclia\Enum\EnumAbstract;

/**
 * Abstract base class for enum array classes.
 */
abstract class EnumArrayAbstract
{
    protected array $items;

    /**
     * Constructor. Set array of values and check each one is an allowed value.
     *
     * @param array $values
     */
    final public function __construct(array $values)
    {
        $this->items = [];
        foreach ($values as $value) {
            $this->items[] = $this->addValue($value);
        }
    }

    /**
     * Get array values.
     *
     * @return array
     */
    final public function getValues(): array
    {
        $values = [];
        /** @var EnumAbstract $item */
        foreach ($this->items as $item) {
            $values[] = $item->value;
        }
        return $values;
    }

    /**
     * Add a value into array.
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function addValue(EnumAbstract $value)
    {
        return call_user_func([$this, 'testValue'], $value);
    }
}
