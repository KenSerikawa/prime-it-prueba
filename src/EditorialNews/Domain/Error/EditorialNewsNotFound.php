<?php 

namespace ElConfidencial\EditorialNews\Domain\Error;

use Exception;

class EditorialNewsNotFound extends Exception
{
    public function __construct(string $message = "Editorial News not found.", int $code = 0, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
