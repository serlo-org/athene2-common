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
     * @return  ObjectManager $objectManager
     */
    public function getObjectManager()
    {
        return $this->objectManager;
    }

    /**
     * @param ObjectManager $objectManager
     * @return void
     */
    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }
}
