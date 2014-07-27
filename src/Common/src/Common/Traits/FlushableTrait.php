<?php
namespace Common\Traits;

trait FlushableTrait
{

    public function flush()
    {
        $this->getObjectManager()->flush();

        return $this;
    }

    public function persist($object)
    {
        $this->getObjectManager()->persist($object);

        return $this;
    }
}
