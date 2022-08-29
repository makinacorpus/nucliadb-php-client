<?php

namespace Nuclia\Enum;

class SortEnum extends EnumAbstract
{
    public const MODIFIED = 'modified';
    public const CREATED = 'created';

    /**
     * @inerhitDoc
     */
    public function getAllowedValues(): array
    {
        return [
          self::MODIFIED,
          self::CREATED
        ];
    }
}
