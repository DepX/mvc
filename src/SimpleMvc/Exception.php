<?php

namespace SimpleMvc;

/**
 * Class Exception
 * @package SimpleMvc
 */
class Exception extends \RuntimeException
{
    /**
     * Exception constructor.
     * @param null $appErrorMessage
     * @param null $appErrorCode
     * @param \Exception|null $previous
     */
    public function __construct($appErrorMessage = null, $appErrorCode = null, \Exception $previous = null)
    {
        echo "\n";
        parent::__construct($appErrorMessage, $appErrorCode, $previous);
    }
}