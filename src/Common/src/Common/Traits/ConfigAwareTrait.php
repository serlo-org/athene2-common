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

    abstract protected function getDefaultConfig();

    protected $config = [];

    /**
     * @return field_type $config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param field_type $config
     * @return self
     */
    public function setConfig(array $config)
    {
        $this->config = ArrayUtils::merge($this->getDefaultConfig(), $config);

        $array = [
            $this->getDefaultConfig(),
            $config,
            $this->config
        ];

        return $this;
    }

    public function appendConfig(array $config)
    {
        $this->config = ArrayUtils::merge($this->config, $config);

        return $this;
    }

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
