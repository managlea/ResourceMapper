<?php

namespace Managlea\Component;


interface ResourceMapperInterface
{
    /**
     * @param string $resourceName
     * @return string
     */
    public static function getEntityManagerName($resourceName);

    /**
     * @param string $resourceName
     * @return string
     */
    public static function getObjectName($resourceName);
}
