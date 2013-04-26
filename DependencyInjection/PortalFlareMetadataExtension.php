<?php

namespace PortalFlare\MetadataBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class PortalFlareMetadataExtension extends Extension {
  /**
   * {@inheritDoc}
   */
  public function load(array $configs, ContainerBuilder $container) {
    $configuration = new Configuration();
    $config        = $this->processConfiguration($configuration, $configs);

    $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
    $loader->load('services.yml');

    $cacheDirectory = '%kernel.cache_dir%/metadata';
    $cacheDirectory = $container->getParameterBag()->resolveValue($cacheDirectory);
    if (!is_dir($cacheDirectory)) {
      mkdir($cacheDirectory, 0777, true);
    }
    $container->getDefinition('portal_flare_metadata.metadata.cache')
              ->replaceArgument(0, $cacheDirectory);

  }
}
