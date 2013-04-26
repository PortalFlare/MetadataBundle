<?php
namespace PortalFlare\Bundle\MetadataBundle;

/**
 * Class MetadataAnnotation
 * @package PortalFlare\Bundle\MetadataBundle
 *
 * @Annotation
 *
 */

class MetadataAnnotation {
  protected $filterable;
  protected $columnlabel;
  protected $formlabel;
  protected $excludedops;

  /**
   * Constructor
   *
   * @param array $options
   */
  public function __construct(array $data) {
    foreach($data as $key=>$value) {
      if (property_exists($this,$key)) {
        $this->$key = $value;
      } else {
        throw new \InvalidArgumentException('Unrecognized metadata: '.$key);
      }
    }
  }

 /**
   * Get filterable
   *
   * @return mixed
   */
  public function getFilterable() {
    return $this->filterable;
  }

  /**
   * Get column label
   *
   * @return mixed
   */
  public function getColumnLabel() {
    return $this->filterable;
  }

  /**
   * Get form label
   *
   * @return mixed
   */
  public function getFormLabel() {
    return $this->filterable;
  }

  /**
   * Get excluded ops
   *
   * @return mixed
   */
  public function getExcludedOps() {
    return $this->filterable;
  }


}