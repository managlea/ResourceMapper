# ResourceMapper

ResourceMapper maps resources with correct entity class and entity manager

[![Build Status](https://scrutinizer-ci.com/g/managlea/ResourceMapper/badges/build.png?b=master)](https://scrutinizer-ci.com/g/managlea/ResourceMapper/build-status/master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/managlea/ResourceMapper/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/managlea/ResourceMapper/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/managlea/ResourceMapper/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/managlea/ResourceMapper/?branch=master)  
[![Code Climate](https://codeclimate.com/github/managlea/ResourceMapper/badges/gpa.svg)](https://codeclimate.com/github/managlea/ResourceMapper) [![Test Coverage](https://codeclimate.com/github/managlea/ResourceMapper/badges/coverage.svg)](https://codeclimate.com/github/managlea/ResourceMapper/coverage)  
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/22340bb0-470c-4779-b4c2-39eccd7fe471/mini.png)](https://insight.sensiolabs.com/projects/22340bb0-470c-4779-b4c2-39eccd7fe471)  
[![Codacy Badge](https://api.codacy.com/project/badge/grade/5b8b9ea227c5436f82d1ff3da360e40a)](https://www.codacy.com/app/Managlea/ResourceMapper)  
[![Build Status](https://travis-ci.org/managlea/ResourceMapper.svg?branch=master)](https://travis-ci.org/managlea/ResourceMapper) [![Circle CI](https://circleci.com/gh/managlea/ResourceMapper/tree/master.svg?style=svg)](https://circleci.com/gh/managlea/ResourceMapper/tree/master)  
![PHP Versions tested](http://php-eye.com/badge/managlea/resource-mapper/tested.svg?branch=master)

## Basic usage
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
// Create new ResourceMapper
$resourceMapper = new ResourceMapper;

// Get entityManagerName (string) for resource
$entityManagerName = $resourceMapper->getEntityManagerName('foo');

// Create new EntityManager (instanceof Managlea\Component\EntityManagerInterface) by name
$entityManager = new EntityManagerFactory::create($entityManagerName);

// Get objectName (string) for resource
$objectName = $resourceMapper->getObjectName('foo');

// Use objectName in entity manager to retrieve entity (object)
$entity = $entityManager->get($objectName, 1);
```
