<?php
namespace Common\Guard;

/**
 * Provide a guard method against numeric data
 */
trait NumericGuardTrait {

    /**
     * Verify that the data is an int
     *
     * @param  mixed  $data           the data to verify
     * @param  string $dataName       the data name
     * @param  string $exceptionClass FQCN for the exception
     * @throws \Exception
     */
    protected function guardAgainstString(
        $data,
        $dataName = 'Argument',
        $exceptionClass = 'Zend\Stdlib\Exception\InvalidArgumentException'
    ) {
        if (!is_numeric($data)) {
            $message = sprintf(
                "%s must be a numeric, [%s] given",
                $dataName,
                is_object($data) ? get_class($data) : gettype($data)
            );
            throw new $exceptionClass($message);
        }
    }
}
