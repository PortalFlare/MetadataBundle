<?php
namespace PortalFlare\MetadataBundle;

use Metadata\Driver\DriverInterface;
use Metadata\MergeableClassMetadata;
use Doctrine\Common\Annotations\Reader;
use PortalFlare\MetadataBundle\PropertyMetadata;

class AnnotationDriver implements DriverInterface {
  private $reader;

  public function __construct(Reader $reader) {
    $this->reader = $reader;
  }

  public function loadMetadataForClass(\ReflectionClass $class) {
    $classMetadata = new MergeableClassMetadata($class->getName());

    foreach ($class->getProperties() as $reflectionProperty) {
      $propertyMetadata = new PropertyMetadata($class->getName(), $reflectionProperty->getName());

      $annotation = $this->reader->getPropertyAnnotation($reflectionProperty, 'PortalFlare\\MetadataBundle\\MetadataAnnotation');

      if (null !== $annotation) {
        $propertyMetadata->setFilterable($annotation->getFilterable());
        $propertyMetadata->setColumnLabel($annotation->getColumnLabel());
        $propertyMetadata->setFormLabel($annotation->getFormLabel());
        $propertyMetadata->setExcludedOps($annotation->getExcludedOps());
      }

      $classMetadata->addPropertyMetadata($propertyMetadata);
    }

    return $classMetadata;
  }
}