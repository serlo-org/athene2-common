<?php
namespace Common\Traits;

use Doctrine\ORM\EntityManager;

trait EntityManagerAwareTrait
{

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @return EntityManager $entityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param EntityManager $entityManager
     * @return void
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}
