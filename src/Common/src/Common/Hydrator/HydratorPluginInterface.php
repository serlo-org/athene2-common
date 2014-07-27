<?php
namespace Common\Hydrator;

interface HydratorPluginInterface
{
    /**
     * Extracts (key, value) pairs from the object for merging with the overall extract result.
     *
     * @param object $object
     * @return array
     */
    public function extract($object);

    /**
     * (Partially) hydrates the object and removes the affected (key, value) pairs from the return set.
     *
     * @param object $object
     * @param array  $data
     * @return array
     */
    public function hydrate($object, array $data);
}
