<?php

namespace Nuclia\Enum;

/**
 * Enum repository static class.
 */
class Enum
{
    /**
     * Create a new MethodEnum.
     *
     * @param string $value
     *
     * @return MethodEnum
     */
    public static function method(string $value): MethodEnum
    {
        return new MethodEnum($value);
    }

    /**
     * Create a new ShowEnum.
     *
     * @param string $value
     *
     * @return ShowEnum
     */
    public static function show(string $value): ShowEnum
    {
        return new ShowEnum($value);
    }

    /**
     * Create a new FieldTypeEnum.
     *
     * @param string $value
     *
     * @return FieldTypeEnum
     */
    public static function fieldType(string $value): FieldTypeEnum
    {
        return new FieldTypeEnum($value);
    }

    /**
     * Create a new ExtractedEnum.
     *
     * @param string $value
     *
     * @return ExtractedEnum
     */
    public static function extracted(string $value): ExtractedEnum
    {
        return new ExtractedEnum($value);
    }

    /**
     * Create a new SortEnum.
     *
     * @param string $value
     *
     * @return SortEnum
     */
    public static function sort(string $value): SortEnum
    {
        return new SortEnum($value);
    }

   /**
    * Create a new RequestOptionsGroupEnum.
    *
    * @param string $value
    *
    * @return RequestOptionsGroupEnum
    */
    public static function requestOptionsGroup(string $value): RequestOptionsGroupEnum
    {
        return new RequestOptionsGroupEnum($value);
    }
}
