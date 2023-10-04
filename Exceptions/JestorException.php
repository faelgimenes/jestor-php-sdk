<?php
    use Throwable;
    class JestorException  extends HttpException {

        public function __construct($message, Throwable $previous = null)
        {
            parent::__construct($message, 422, $previous);
        }
    }
?>