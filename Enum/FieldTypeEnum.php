<?php

namespace Nuclia\Enum;

class FieldTypeEnum extends EnumAbstract
{
  const TEXT = 'text';
  const FILE = 'file';
  const LINK = 'link';
  const LAYOUT = 'layout';
  const CONVERSATION = 'conversation';
  const KEYWORDSET = 'keywordset';
  const DATETIME = 'datetime';
  const GENERIC = 'generic';

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
