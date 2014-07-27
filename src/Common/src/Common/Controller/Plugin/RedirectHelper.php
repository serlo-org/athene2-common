<?php
namespace Common\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\Redirect;

class RedirectHelper extends Redirect
{
    public function toReferer($default = '/')
    {
        $referer = $this->getController()->getRequest()->getHeader('Referer');
        $referer = $referer ? $referer->getUri() : $default;

        return $this->toUrl($referer);
    }
}
