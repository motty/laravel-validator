<?php namespace Motty\Laravel\Validator\Exceptions;

use Exception;
use Illuminate\Support\MessageBag;

class ValidateException extends Exception
{
    /**
     * Errors object
     *
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Create a new validate exception instance
     *
     * @param string            $message
     * @param MessageBag        $errors
     * @param integer           $code
     * @param Exception|null    $previous
     */
    public function __construct($message, MessageBag $errors, $code = 0, Exception $previous = null)
    {
        $this->errors = $errors;

        parent::__construct($message, $code, $previous);
    }

    /**
     * Gets the errors object
     *
     * @return \Illuminate\Support\MessageBag
     */
    public function errors()
    {
        return $this->errors;
    }
}
