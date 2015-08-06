# ResourceMapper

[![Build Status](https://scrutinizer-ci.com/g/managlea/ResourceMapper/badges/build.png?b=master)](https://scrutinizer-ci.com/g/managlea/ResourceMapper/build-status/master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/managlea/ResourceMapper/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/managlea/ResourceMapper/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/managlea/ResourceMapper/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/managlea/ResourceMapper/?branch=master)

## Basic usage
```php

// Get EntityManager class name for "foo" resource
$entityManagerName = ResourceMapper::getEntityManager('foo');

// $entityManagerName can be bassed to factory to create actual EntityManager
$entityManager = EntityManagerFactory::create($entityManagerName);
