<?php

namespace Nuclia\Query;

use Nuclia\EnumArray\ExtractedEnumArray;
use Nuclia\EnumArray\FieldTypeEnumArray;
use Nuclia\EnumArray\ShowEnumArray;
use Nuclia\RequestOptions\RequestOptionsGroup;
use Nuclia\Utils;

class GetResourceQuery
{
    /**
     * Show.
     *
     * @var ShowEnumArray|null
     */
    protected ?ShowEnumArray $show;

    /**
     * Field type.
     *
     * @var FieldTypeEnumArray|null
     */
    protected ?FieldTypeEnumArray $fieldType;

    /**
     * Extracted.
     *
     * @var ExtractedEnumArray|null
     */
    protected ?ExtractedEnumArray $extracted;

    public function __construct()
    {
        $this->show = null;
        $this->fieldType = null;
        $this->extracted = null;
    }

  /**
   * @param ShowEnumArray|null $show
   * @return GetResourceQuery
   */
  public function setShow(?ShowEnumArray $show): static
  {
      $this->show = $show;
      return $this;
  }

  /**
   * @param FieldTypeEnumArray|null $fieldType
   *
   * @return $this
   */
  public function setFieldType(?FieldTypeEnumArray $fieldType): static
  {
      $this->fieldType = $fieldType;
      return $this;
  }

  /**
   * @param ExtractedEnumArray|null $extracted
   *
   * @return $this
   */
  public function setExtracted(?ExtractedEnumArray $extracted): static
  {
      $this->extracted = $extracted;
      return $this;
  }

  /**
   * Build query.
   *
   * @return RequestOptionsGroup
   */
  public function build(): RequestOptionsGroup
  {
      return  (new RequestOptionsGroup())
        ->set('show', Utils::getEnumArrayValues($this->show))
        ->set('field_type', Utils::getEnumArrayValues($this->fieldType))
        ->set('extracted', Utils::getEnumArrayValues($this->extracted));
  }
}
