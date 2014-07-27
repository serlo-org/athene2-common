<?php
namespace Common\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Session\Container;

class RefererProvider extends AbstractPlugin
{
    protected $container;

    public function toUrl($default = '/')
    {
        $referer = $this->getController()->getRequest()->getHeader('Referer');
        $referer = $referer ? $referer->getUri() : $default;

        return $referer;
    }

    public function store($id = 'default')
    {
        if (!$this->container) {
            $this->container = new Container($this->normalizeId($id));
        }
        $this->container->ref = $this->toUrl();

        return $this;
    }

    public function fromStorage($default = '/', $id = 'default')
    {
        $container = new Container($this->normalizeId($id));

        return isset($container->ref) ? $container->ref : $this->toUrl($default);
    }

    protected function normalizeId($id)
    {
        return 'Ref\\' . str_replace('-', '\\', $id);
    }
}
