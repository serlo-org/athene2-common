<?php
namespace Common\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractOptionsFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $className = $this->getClassName();
        $keyName   = $this->getKeyName();
        $config    = $serviceLocator->get('config');
        $options   = isset($config[$keyName]) ? $config[$keyName] : [];
        return new $className($options);
    }

    /**
     * @return string
     */
    abstract protected function getClassName();

    /**
     * @return string
     */
    abstract protected function getKeyName();
}
 