<?php
namespace Common\Traits;

use Doctrine\Common\Persistence\ObjectManager;

trait ObjectManagerAwareTrait
{

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @return \Doctrine\Common\Persistence\ObjectManager $objectManager
     */
    public function getObjectManager()
    {
        return $this->objectManager;
    }

    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $objectManager
     * @return self
     */
    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;

        return $this;
    }
}
