<?php

namespace Jestor\Exceptions;

use Exception;
use Throwable;

class JestorException  extends Exception
{

    public function __construct($message, Throwable $previous = null)
    {
        parent::__construct($message, 422, $previous);
    }
}
