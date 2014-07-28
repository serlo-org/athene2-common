<?php
namespace Common\Traits;

use Doctrine\Common\Persistence\ObjectManager;

trait FlushableTrait
{
    /**
     * @return void
     */
    public function flush()
    {
        $this->getObjectManager()->flush();
    }

    /**
     * @param object $object
     * @return void
     */
    public function persist($object)
    {
        $this->getObjectManager()->persist($object);
    }

    /**
     * @return ObjectManager
     */
    abstract public function getObjectManager();
}
