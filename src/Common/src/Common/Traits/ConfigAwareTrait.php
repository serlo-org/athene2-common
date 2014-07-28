<?php
namespace Common\Traits;

use Zend\Stdlib\ArrayUtils;

/**
 * Class ConfigAwareTrait
 *
 * @package Common\Traits
 * @deprecated
 */
trait ConfigAwareTrait
{
    /**
     * @return array
     */
    abstract protected function getDefaultConfig();

    /**
     * @var array
     */
    protected $config = [];

    /**
     * @return array $config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     * @return void
     */
    public function setConfig(array $config)
    {
        $this->config = ArrayUtils::merge($this->getDefaultConfig(), $config);
    }

    /**
     * @param array $config
     * @return void
     */
    public function appendConfig(array $config)
    {
        $this->config = ArrayUtils::merge($this->config, $config);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getOption($key)
    {
        if (array_key_exists($key, $this->getConfig())) {
            return $this->getConfig()[$key];
        } else {
            $this->setConfig([]);
            if (array_key_exists($key, $this->getConfig())) {
                return $this->getConfig()[$key];
            } else {
                return null;
            }
        }
    }
}
