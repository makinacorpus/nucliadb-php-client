<?php

namespace Nuclia\EnumArray;

/**
 * Abstract base class for enum array classes.
 */
abstract class EnumArrayAbstract implements EnumArrayInterface
{
    protected $items;

    /**
     * @inerhitDoc
     */
    final public function __construct(array $values)
    {
        $this->items = [];
        foreach ($values as $value) {
            $this->items[] = $this->addValue($value);
        }
    }

    /**
     * @inerhitDoc
     */
    final public function getValues(): array
    {
        $values = [];
        foreach ($this->items as $item) {
            $values[] = $item->value;
        }
        return $values;
    }

    public function addValue(mixed $value)
    {
        return call_user_func([$this, 'testValue'], $value);
    }
}
