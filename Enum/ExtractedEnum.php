<?php

namespace Nuclia\Enum;

class ExtractedEnum extends EnumAbstract
{
  const TEXT = 'text';
  const METADATA = 'metadata';
  const LARGE_METADATA = 'large_metadata';
  const VECTORS = 'vectors';
  const LINK = 'link';
  const FILE = 'file';

  /**
   * @inerhitDoc
   */
  public function getAllowedValues(): array
  {
    return [
      self::TEXT,
      self::METADATA,
      self::LARGE_METADATA,
      self::VECTORS,
      self::LINK,
      self::FILE
    ];
  }

}
