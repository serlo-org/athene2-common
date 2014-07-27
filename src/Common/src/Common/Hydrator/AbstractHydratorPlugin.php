<?php
namespace Common\Hydrator;

abstract class AbstractHydratorPlugin implements HydratorPluginInterface
{
    /**
     * Extracts (key, value) pairs from the object for merging with the overall extract result.
     * Most plugins don't need custom extraction but rather custom hydration.
     * This method always returns an empty set.
     *
     * @param object $object
     * @return array
     */
    public function extract($object)
    {
        return [];
    }
}
