<?php

namespace Managlea\Tests;


use Managlea\Component\ResourceMapper;
use Managlea\Component\ResourceMapperInterface;

class ResourceMapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \Exception
     */
    public function getEntityManagerMappingMissing()
    {
        $resourceMapper = new ResourceMapper;
        $resourceMapper->getEntityManagerName('foo');
    }

    /**
     * @test
     */
    public function getEntityManager()
    {
        $resourceMapper = new ResourceMapper;
        $this->assertTrue($resourceMapper instanceof ResourceMapperInterface);

        // Get default EntityManager
        $entityManager = $resourceMapper->getEntityManagerName('bar');
        $this->assertEquals($entityManager, 'DoctrineEntityManager');

        $entityManager = $resourceMapper->getEntityManagerName('baz');
        $this->assertEquals($entityManager, 'DoctrineEntityManager');

        // Get customer EntityManager
        $entityManager = $resourceMapper->getEntityManagerName('zoo');
        $this->assertEquals($entityManager, 'Zoo');
    }

    /**
     * @test
     */
    public function getObjectName()
    {
        $resourceMapper = new ResourceMapper;
        $this->assertTrue($resourceMapper instanceof ResourceMapperInterface);

        $entityManager = $resourceMapper->getObjectName('bar');
        $this->assertEquals($entityManager, 'Entities\Product');

        $entityManager = $resourceMapper->getObjectName('baz');
        $this->assertEquals($entityManager, 'baz');

        $entityManager = $resourceMapper->getObjectName('zoo');
        $this->assertEquals($entityManager, 'Entities\Product');
    }
}
