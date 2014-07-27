<?php
namespace Common\Listener;

use Zend\EventManager\SharedListenerAggregateInterface;

abstract class AbstractSharedListenerAggregate implements SharedListenerAggregateInterface
{
    /**
     * An array containing all registered listeners.
     *
     * @var array
     */
    protected $listeners = [];

    /**
     * Returns the class, this listener is listening on
     *
     * @return string
     */
    abstract protected function getMonitoredClass();

    /**
     * {@inheritDoc}
     */
    public function detachShared(\Zend\EventManager\SharedEventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($this->getMonitoredClass(), $listener)) {
                unset($this->listeners[$index]);
            }
        }
    }
}
