<?php

namespace Managlea\Tests;


use Managlea\Component\ResourceMapper;

class ResourceMapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \Exception
     */
    public function getEntityManagerMappingMissing()
    {
        ResourceMapper::getEntityManagerName('foo');
    }

    /**
     * @test
     */
    public function getEntityManager()
    {
        // Get default EntityManager
        $entityManager = ResourceMapper::getEntityManagerName('bar');
        $this->assertEquals($entityManager, 'DoctrineEntityManager');

        $entityManager = ResourceMapper::getEntityManagerName('baz');
        $this->assertEquals($entityManager, 'DoctrineEntityManager');

        // Get customer EntityManager
        $entityManager = ResourceMapper::getEntityManagerName('zoo');
        $this->assertEquals($entityManager, 'Zoo');
    }

    /**
     * @test
     */
    public function getObjectName()
    {
        $entityManager = ResourceMapper::getObjectName('bar');
        $this->assertEquals($entityManager, 'Entities\Product');

        $entityManager = ResourceMapper::getObjectName('baz');
        $this->assertEquals($entityManager, 'baz');

        $entityManager = ResourceMapper::getObjectName('zoo');
        $this->assertEquals($entityManager, 'Entities\Product');
    }
}
