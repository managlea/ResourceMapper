<?php

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
    private function getResourceMappingConf($resourceName)
    {
        if (!array_key_exists($resourceName, $this->mapping)) {
            throw new \Exception(sprintf('Mapping configuration missing for resource: "%s"', $resourceName));
        }

        return $this->mapping[$resourceName];
    }

    /**
     * @return array
     */
    private function setConfig()
    {
        $configValues = Yaml::parse(file_get_contents(__DIR__ . '/../config/resource_mapping.yml'));

        return $configValues;
    }

    /**
     * @param $resourceName
     * @return string
     * @throws \Exception
     */
    public function getEntityManagerName($resourceName)
    {
        $resourceConf = $this->getResourceMappingConf($resourceName);
        if (is_array($resourceConf)) {
            $entityManagerName = $resourceConf['entity_manager'];
        } else {
            $entityManagerName = $this->defaultEntityManager;
        }

        return $entityManagerName;
    }

    /**
     * @param $resourceName
     * @return string
     * @throws \Exception
     */
    public function getObjectName($resourceName)
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
