<?php

namespace Nuclia\Enum;

use Exception;
use LogicException;

/**
 * Abstract base class for enum classes.
 *
 * NB: Required compatibility with PHP 7.4 avoid using php 8.1 enum.
 */
abstract class EnumAbstract
{
    protected $value;

    /**
     * @inerhitDoc
     */
    final public function __construct(string $value)
    {
        if (!in_array($value, $this->getAllowedValues(), true)) {
            throw new LogicException(sprintf('"%s" : Value not allowed for %s', $value, get_class($this)));
        }
        $this->value = $value;
    }

    /**
     * Get the stored value.
     *
     * @return string
     */
    final public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Get allowed enum values to be implemented by extended classes.
     *
     * @return array
     */
    abstract public function getAllowedValues(): array;

    /**
     * Emulate a PHP 8.1+ Enum's value property.
     *
     * @param string $name Property name
     *
     * @return string
     * @throws Exception
     */
    public function __get(string $name)
    {
        if ($name === 'value') {
            return $this->getValue();
        }

        throw new Exception(strtr('Unable to get "@name" property.', [
          '@name' => $name
        ]));
    }
}
