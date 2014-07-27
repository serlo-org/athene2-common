<?php
namespace Common\Hydrator;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;

class HydratorPluginManager extends AbstractPluginManager
{
    /**
     * Validate the plugin
     * Checks that the filter loaded is either a valid callback or an instance
     * of FilterInterface.
     *
     * @param  mixed $plugin
     * @return void
     * @throws Exception\RuntimeException if invalid
     */
    public function validatePlugin($plugin)
    {
        if (!$plugin instanceof HydratorPluginInterface) {
            throw new Exception\RuntimeException(sprintf(
                'Expected %s but got %s',
                is_object($plugin) ? get_class($plugin) : gettype($plugin)
            ));
        }
    }
}
