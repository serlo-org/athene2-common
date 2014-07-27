<?php
namespace Common\Hydrator;

use RuntimeException;
use Zend\Stdlib\ArrayUtils;
use Zend\Stdlib\Hydrator\HydratorInterface;

abstract class AbstractKeyHydrator implements HydratorInterface
{
    public function extract($object)
    {
        if (!$this->isValid($object)) {
            throw new RuntimeException();
        }

        $data = [];
        foreach ($this->getKeys() as $key) {
            $method      = 'get' . ucfirst($key);
            $data['key'] = $object->$method();
        }

        return $data;
    }

    public function hydrate(array $data, $object)
    {
        if (!$this->isValid($object)) {
            throw new RuntimeException();
        }

        $data = ArrayUtils::merge($this->extract($object), $data);

        foreach ($this->getKeys() as $key) {
            $method = 'set' . ucfirst($key);
            $value  = $this->getKey($data, $key);
            if ($value !== null) {
                $object->$method($value);
            }
        }

        return $object;
    }

    /**
     * @return array
     */
    abstract protected function getKeys();

    /**
     * @param mixed $object
     * @return bool
     */
    abstract protected function isValid($object);

    /**
     * @param array  $data
     * @param string $key
     * @return mixed
     */
    protected function getKey(array $data, $key)
    {
        return array_key_exists($key, $data) ? $data[$key] : null;
    }
}
