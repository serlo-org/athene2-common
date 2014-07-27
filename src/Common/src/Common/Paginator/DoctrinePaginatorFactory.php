<?php
namespace Common\Paginator;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Pagination\Paginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrinePaginatorAdapter;
use Zend\Paginator\Paginator as ZendPaginator;

/**
 * @category   Zend
 * @package    Paginator
 */
class DoctrinePaginatorFactory
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Uses doctrine to create a paginator
     *
     * @param $dql
     * @param $page
     * @param $limit
     * @return ZendPaginator
     */
    public function createPaginator($dql, $page, $limit)
    {
        $offset        = ($page - 1) * $limit;
        $query         = $this->entityManager->createQuery($dql)->setMaxResults($limit)->setFirstResult($offset);
        $paginator     = new Paginator($query);
        $adapter       = new DoctrinePaginatorAdapter($paginator);
        $zendPaginator = new ZendPaginator($adapter);
        $zendPaginator->setCurrentPageNumber($page);
        $zendPaginator->setItemCountPerPage($limit);
        return $zendPaginator;
    }
}
