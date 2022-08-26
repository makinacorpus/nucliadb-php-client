<?php

namespace Nuclia\Enum;

interface EnumInterface
{
  /**
   * Constructor. Set value and check it is an allowed value.
   * @param string $value
   */
  public function __construct(string $value);

  /**
   * Get allowed enum values.
   * @return array
   */
  public function getAllowedValues(): array;

  /**
   * Get the stored value.
   * @return string
   */
  public function getValue(): string;
}
