<?php

namespace AppBundle\DependencyInjection;

use RuntimeException;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\FileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class AppExtension extends Extension
{
    /**
     * @param array $config
     * @param ContainerBuilder $container
     */
    public function load(array $config, ContainerBuilder $container): void
    {
        $config = $this->parseExternalConfiguration($config);
        $loader = $this->createServiceContainerFileLoader($container);
        $this->loadServiceDefinitionFiles($loader, $config);
    }

    /**
     * @param array $config
     * @return array
     */
    private function parseExternalConfiguration(array $config): array
    {
        $configuration = new Configuration();
        return $this->processConfiguration($configuration, $config);
    }

    /**
     * @param ContainerBuilder $container
     * @return FileLoader
     */
    private function createServiceContainerFileLoader(ContainerBuilder $container): FileLoader
    {
        $locator = new FileLocator(__DIR__.'/../Resources/config');
        return new YamlFileLoader($container, $locator);
    }

    /**
     * @param FileLoader $loader
     * @param array $config
     */
    private function loadServiceDefinitionFiles(FileLoader $loader, array $config): void
    {
        try {
            $loader->load('services.yml');
        } catch (\Throwable $exception) {
            $message = sprintf('Failed to inject service definition file because: %s', $exception->getMessage());
            throw new RuntimeException($message, $exception->getCode(), $exception);
        }
    }
}
