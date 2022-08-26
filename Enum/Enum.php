<?php

namespace Nuclia\Enum;

class Enum
{
  /**
   * Create a new "method" enum value.
   * @param string $value
   * @return MethodEnum
   */
  public static function method(string $value): MethodEnum
  {
    return new MethodEnum($value);
  }

  /**
   * Create a new "show" enum value.
   * @param string $value
   * @return ShowEnum
   */
  public static function show(string $value): ShowEnum
  {
    return new ShowEnum($value);
  }

  /**
   * Create a new "field type" enum value.
   * @param string $value
   * @return FieldTypeEnum
   */
  public static function fieldType(string $value): FieldTypeEnum
  {
    return new FieldTypeEnum($value);
  }

  /**
   * Create a new "extracted" enum value.
   * @param string $value
   * @return ExtractedEnum
   */
  public static function extracted(string $value): ExtractedEnum
  {
    return new ExtractedEnum($value);
  }

  /**
   * Create a new "sort" enum value.
   * @param string $value
   * @return sortEnum
   */
  public static function sort(string $value): sortEnum
  {
    return new sortEnum($value);
  }
}
