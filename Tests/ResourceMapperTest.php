<?php

namespace Managlea\Tests;


use Managlea\Component\ResourceMapper;
use Managlea\Component\ResourceMapperInterface;

class ResourceMapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ResourceMapperInterface
     */
    private $resourceMapper;

    public function setUp()
    {
        $this->resourceMapper = new ResourceMapper;
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function getEntityManagerMappingMissing()
    {
        $this->resourceMapper->getEntityManagerName('foo');
    }

    /**
     * @test
     */
    public function newResourceMapper()
    {
        $this->assertTrue($this->resourceMapper instanceof ResourceMapperInterface);
    }

    /**
     * @test
     */
    public function getEntityManagerName()
    {
        // Get default EntityManager
        $entityManager = $this->resourceMapper->getEntityManagerName('bar');
        $this->assertEquals($entityManager, 'DoctrineEntityManager');

        $entityManager = $this->resourceMapper->getEntityManagerName('baz');
        $this->assertEquals($entityManager, 'DoctrineEntityManager');

        // Get customer EntityManager
        $entityManager = $this->resourceMapper->getEntityManagerName('zoo');
        $this->assertEquals($entityManager, 'Zoo');
    }

    /**
     * @test
     */
    public function getObjectName()
    {
        $entityManager = $this->resourceMapper->getObjectName('bar');
        $this->assertEquals($entityManager, 'Entities\Product');

        $entityManager = $this->resourceMapper->getObjectName('baz');
        $this->assertEquals($entityManager, 'baz');

        $entityManager = $this->resourceMapper->getObjectName('zoo');
        $this->assertEquals($entityManager, 'Entities\Product');
    }
}
