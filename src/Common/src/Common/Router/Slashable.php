<?php
namespace Common\Router;

use Zend\Mvc\Router\Http\Segment;

class Slashable extends Segment
{
    public function __construct($route, array $constraints = [], array $defaults = [])
    {
        parent::__construct($route, $constraints, $defaults);

        // add the slash to the allowed unencoded chars map, since this route
        // includes that charater in its 'page' parameter
        if (!isset(static::$urlencodeCorrectionMap['%2F'])) {
            static::$urlencodeCorrectionMap['%2F'] = '/';
        }
    }
}
