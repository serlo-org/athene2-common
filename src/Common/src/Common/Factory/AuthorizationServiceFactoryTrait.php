<?php
namespace Common\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcRbac\Service\AuthorizationService;

trait AuthorizationServiceFactoryTrait
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return AuthorizationService
     */
    public function getAuthorizationService(ServiceLocatorInterface $serviceLocator)
    {
        return $serviceLocator->get('ZfcRbac\Service\AuthorizationService');
    }
}
