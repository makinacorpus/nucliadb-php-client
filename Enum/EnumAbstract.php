<?php

namespace Nuclia\Enum;

use LogicException;

abstract class EnumAbstract implements EnumInterface
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
   * @inerhitDoc
   */
  final public function getValue(): string
  {
    return $this->value;
  }
}
