<?php

namespace Nuclia\Enum;

class FieldTypeEnum extends EnumAbstract
{
    public const TEXT = 'text';
    public const FILE = 'file';
    public const LINK = 'link';
    public const LAYOUT = 'layout';
    public const CONVERSATION = 'conversation';
    public const KEYWORDSET = 'keywordset';
    public const DATETIME = 'datetime';
    public const GENERIC = 'generic';

    /**
     * @inerhitDoc
     */
    public function getAllowedValues(): array
    {
        return [
          self::TEXT,
          self::FILE,
          self::LINK,
          self::LAYOUT,
          self::CONVERSATION,
          self::KEYWORDSET,
          self::DATETIME,
          self::GENERIC,
        ];
    }
}
