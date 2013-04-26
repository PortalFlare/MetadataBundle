<?php
namespace PortalFlare\MetadataBundle;

use Metadata\MetadataFactoryInterface;

class MetadataProcessor {
  private $metadataFactory;

  public function __construct(MetadataFactoryInterface $metadataFactory) {
    $this->metadataFactory = $metadataFactory;
  }

  public function getMetadata($object) {
    if (!is_object($object)) {
      throw new \InvalidArgumentException('No object provided');
    }

    $classMetadata = $this->metadataFactory->getMetadataForClass(get_class($object));

    return $classMetadata;
  }

}