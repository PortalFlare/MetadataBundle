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
   * Get column label
   *
   * @return mixed
   */
  public function getColumnLabel() {
    return $this->columnlabel;
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
   * Get excluded ops
   *
   * @return mixed
   */
  public function getExcludedOps() {
    return $this->excludedops;
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
    list($this->class, $this->name, $this->filterable, $this->columnlabel, $this->formlabel, $this->excludedops) = unserialize($str);

    $this->reflection = new \ReflectionProperty($this->class, $this->name);
    $this->reflection->setAccessible(true);
  }

}