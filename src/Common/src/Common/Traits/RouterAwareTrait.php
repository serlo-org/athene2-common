<?php
namespace Common\Traits;

use Zend\Mvc\Router\RouteInterface;

trait RouterAwareTrait
{

    /**
     * @var RouteInterface
     */
    protected $router;

    /**
     * @return RouteInterface $router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param RouteInterface $router
     * @return void
     */
    public function setRouter(RouteInterface $router)
    {
        $this->router = $router;
    }
}
