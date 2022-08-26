<?php

namespace Nuclia\EnumArray;

class EnumArray
{
  /**
   * Create a new "show" array of enum values.
   * @param array $values
   * @return ShowEnumArray
   */
  public static function show(array $values): ShowEnumArray {
    return new ShowEnumArray($values);
  }

  /**
   * Create a new "field type" array of enum values.
   * @param array $values
   * @return FieldTypeEnumArray
   */
  public static function fieldType(array $values): FieldTypeEnumArray {
    return new FieldTypeEnumArray($values);
  }

  /**
   * Create a new "extracted" array of enum values.
   * @param array $values
   * @return ExtractedEnumArray
   */
  public static function extracted(array $values): ExtractedEnumArray {
    return new ExtractedEnumArray($values);
  }
}
