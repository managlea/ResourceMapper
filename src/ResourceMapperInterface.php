<?php

declare(strict_types=1);

namespace Managlea\Component;


interface ResourceMapperInterface
{
    /**
     * @param string $resourceName
     * @return string
     */
    public function getEntityManagerName(string $resourceName) : string;

    /**
     * @param string $resourceName
     * @return string
     */
    public function getObjectName(string $resourceName) : string;
}
