<?php
namespace Common\Factory;

use Common\Hydrator\HydratorPluginManager;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class HydratorPluginManagerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config   = $serviceLocator->get('config')['hydrator_plugins'];
        $config   = new Config($config);
        $hydrator = new HydratorPluginManager($config);
        return $hydrator;
    }
}
