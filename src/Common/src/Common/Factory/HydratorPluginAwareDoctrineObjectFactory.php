<?php
namespace Common\Factory;

use Common\Hydrator\HydratorPluginAwareDoctrineObject;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class HydratorPluginAwareDoctrineObjectFactory implements FactoryInterface
{
    use EntityManagerFactoryTrait;

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $objectManager = $this->getEntityManager($serviceLocator);
        $pluginManager = $serviceLocator->get('Common\Hydrator\HydratorPluginManager');
        $hydrator      = new HydratorPluginAwareDoctrineObject($objectManager, $pluginManager);
        return $hydrator;
    }
}
