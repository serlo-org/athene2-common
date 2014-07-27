<?php
namespace Common\Factory;

use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\ServiceLocatorInterface;

trait EntityManagerFactoryTrait
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return EntityManager
     */
    public function getEntityManager(ServiceLocatorInterface $serviceLocator)
    {
        return $serviceLocator->get('Doctrine\ORM\EntityManager');
    }
}
