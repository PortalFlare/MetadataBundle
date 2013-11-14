<?php
namespace PortalFlare\MetadataBundle;

use Metadata\PropertyMetadata as BasePropertyMetadata;

/**
 * Class PropertyMetadata
 * @package PortalFlare\MetadataBundle
 *
 */

class PropertyMetadata extends BasePropertyMetadata {
  protected $filterable;
  protected $readonly;
  protected $columnlabel;
  protected $formlabel;
  protected $excludedops;

  /**
   * Get filterable
   *
   * @return mixed
   */
  public function getFilterable() {
    return $this->filterable;
  }

  /**
   * Set filterable
   *
   * @param $filterable
   */
  public function setFilterable($filterable) {
    $this->filterable = $filterable;
  }

  /**
   * Get readonly
   *
   * @return mixed
   */
  public function getReadonly() {
    return $this->readonly;
  }

  /**
   * Set readonly
   *
   * @param $readonly
   */
  public function setReadonly($readonly) {
    $this->readonly = $readonly;
  }

  /**
   * Get column label
   *
   * @return mixed
   */
  public function getColumnLabel() {
    return $this->columnlabel;
  }

  /**
   * Set column label
   *
   * @parame string
   */
  public function setColumnLabel($columnLabel) {
    $this->columnlabel = $columnLabel;
  }

  /**
   * Get form label
   *
   * @return mixed
   */
  public function getFormLabel() {
    return $this->formlabel;
  }

  /**
   * Set form label
   *
   * @parame string
   */
  public function setFormLabel($formLabel) {
    $this->formlabel = $formLabel;
  }

  /**
   * Get excluded ops
   *
   * @return mixed
   */
  public function getExcludedOps() {
    return $this->excludedops;
  }

  /**
   * Set excluded ops
   *
   * @parame string
   */
  public function setExcludedOps($excludedOps) {
    $this->excludedops = $excludedOps;
  }

  /**
   * Prepare class for cache
   *
   * @return string
   */
  public function serialize() {
    return serialize(array(
      $this->class,
      $this->name,
      $this->filterable,
      $this->readonly,
      $this->columnlabel,
      $this->formlabel,
      $this->excludedops,
    ));
  }

  /**
   * Unserialize this class from the cache
   *
   * @param string $str
   */
  public function unserialize($str) {
    list($this->class, $this->name, $this->filterable, $this->readonly, $this->columnlabel, $this->formlabel, $this->excludedops) = unserialize($str);

    $this->reflection = new \ReflectionProperty($this->class, $this->name);
    $this->reflection->setAccessible(true);
  }

}
