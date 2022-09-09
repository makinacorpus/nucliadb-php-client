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
            $values[] = $item->getValue();
        }
        return $values;
    }
}
