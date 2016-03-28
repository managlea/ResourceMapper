<?php

declare(strict_types=1);

namespace Managlea\Component;


use Symfony\Component\Yaml\Yaml;

/**
 * Class ResourceMapper
 * @package Managlea\Component
 */
final class ResourceMapper implements ResourceMapperInterface
{
    /**
     * @var array
     */
    private $mapping;
    /**
     * @var
     */
    private $defaultEntityManager;

    /**
     * Initialize new ResourceMapper and set configs for usage
     */
    public function __construct()
    {
        $conf = $this->setConfig();
        $this->defaultEntityManager = $conf['default_entity_manager'];
        $this->mapping = $conf['mapping'];
    }

    /**
     * @param $resourceName
     * @return mixed
     * @throws \Exception
     */
    private function getResourceMappingConf(string $resourceName)
    {
        if (!array_key_exists($resourceName, $this->mapping)) {
            throw new \Exception(sprintf('Mapping configuration missing for resource: "%s"', $resourceName));
        }

        return $this->mapping[$resourceName];
    }

    /**
     * @return array
     */
    private function setConfig() : array
    {
        $configValues = Yaml::parse(file_get_contents(__DIR__ . '/../config/resource_mapping.yml'));

        return $configValues;
    }

    /**
     * @param $resourceName
     * @return string
     * @throws \Exception
     */
    public function getEntityManagerName(string $resourceName) : string
    {
        $resourceConf = $this->getResourceMappingConf($resourceName);
        if (is_array($resourceConf)) {
            return $resourceConf['entity_manager'];
        }

        return $this->defaultEntityManager;
    }

    /**
     * @param $resourceName
     * @return string
     * @throws \Exception
     */
    public function getObjectName(string $resourceName) : string
    {
        $resourceConf = $this->getResourceMappingConf($resourceName);
        if (is_array($resourceConf)) {
            if (!array_key_exists('object_name', $resourceConf)) {
                $objectName = $resourceName;
            } else {
                $objectName = $resourceConf['object_name'];
            }
        } else {
            $objectName = $resourceConf;
        }

        return $objectName;
    }
}
