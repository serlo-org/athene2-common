<?php
namespace Common\Validator;

use Zend\Validator\Identical;
use Zend\Validator\Exception;

class NotIdentical extends Identical
{
    /**
     * Error codes
     *
     * @const string
     */
    const SAME          = 'same';
    const MISSING_TOKEN = 'missingToken';

    /**
     * Error messages
     *
     * @var array
     */
    protected $messageTemplates = array(
        self::SAME          => "The two given tokens are not supposed to match",
        self::MISSING_TOKEN => 'No token was provided to match against',
    );


    /**
     * Returns true if and only if a token has been set and the provided value
     * matches that token.
     *
     * @param  mixed $value
     * @param  array $context
     * @return bool
     * @throws Exception\RuntimeException if the token doesn't exist in the context array
     */
    public function isValid($value, array $context = null)
    {
        $this->setValue($value);

        $token = $this->getToken();

        if (!$this->getLiteral() && $context !== null) {
            if (is_array($token)) {
                while (is_array($token)) {
                    $key = key($token);
                    if (!isset($context[$key])) {
                        break;
                    }
                    $context = $context[$key];
                    $token   = $token[$key];
                }
            }

            // if $token is an array it means the above loop didn't went all the way down to the leaf,
            // so the $token structure doesn't match the $context structure
            if (is_array($token) || !isset($context[$token])) {
                $token = $this->getToken();
            } else {
                $token = $context[$token];
            }
        }

        if ($token === null) {
            $this->error(self::MISSING_TOKEN);
            return false;
        }

        $strict = $this->getStrict();
        if (!($strict && ($value !== $token)) || (!$strict && ($value != $token))) {
            $this->error(self::SAME);
            return false;
        }

        return true;
    }
}
