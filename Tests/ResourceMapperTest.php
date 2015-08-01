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
        ResourceMapper::getEntityManager('foo');
    }

    /**
     * @test
     */
    public function getEntityManager()
    {
        // Get default EntityManager
        $entityManager = ResourceMapper::getEntityManager('bar');
        $this->assertEquals($entityManager, 'DoctrineEntityManager');

        $entityManager = ResourceMapper::getEntityManager('baz');
        $this->assertEquals($entityManager, 'DoctrineEntityManager');

        // Get customer EntityManager
        $entityManager = ResourceMapper::getEntityManager('zoo');
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
