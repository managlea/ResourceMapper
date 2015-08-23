<?php

namespace Managlea\Component;


interface ResourceMapperInterface
{
    /**
     * @param string $resourceName
     * @return string
     */
    public function getEntityManagerName($resourceName);

    /**
     * @param string $resourceName
     * @return string
     */
    public function getObjectName($resourceName);
}
