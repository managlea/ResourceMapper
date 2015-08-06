# ResourceMapper

ResourceMapper maps resources with correct entity class and entity manager

[![Build Status](https://scrutinizer-ci.com/g/managlea/ResourceMapper/badges/build.png?b=master)](https://scrutinizer-ci.com/g/managlea/ResourceMapper/build-status/master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/managlea/ResourceMapper/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/managlea/ResourceMapper/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/managlea/ResourceMapper/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/managlea/ResourceMapper/?branch=master)

## Basic usage
Read more about [Managlea\Component\EntityManager](https://github.com/managlea/EntityManager) which is required by this package.
### Configuration file
```yaml
# resource_mapping.yml

default_entity_manager: Managlea\Component\DoctrineEntityManager
mapping:
  foo:
    object_name: Entities\Foo
  bar:
    entity_manager: BarEntityManager
    object_name: Entities\Bar
```
### Code execution
```php
// Create new EntityManagerFactory (instanceof Managlea\Component\EntityManagerFactoryInterface)
$entityManagerFactory = new EntityManagerFactory();

// Create new ResourceMapper by passing $entityManagerFactory in as parameter
$resourceMapper = ResourceMapper::initialize($entityManagerFactory);

// Get EntityManager (instanceof Managlea\Component\EntityManagerInterface) for resource
$entityManager = $resourceMapper->getEntityManager('foo');

// Get objectName (string) for resource
$objectName = $resourceMapper->getObjectName('foo');

// Use objectName in entity manager to retrieve entity (object)
$entity = $entityManager->get($objectName, 1);
```
