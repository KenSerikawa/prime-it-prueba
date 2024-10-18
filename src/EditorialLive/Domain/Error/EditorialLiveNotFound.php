<?php 

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Domain\Error;

use ElConfidencial\Shared\Domain\Errors\ErrorCodes;
use Exception;

class EditorialLiveNotFound extends Exception
{
    public function __construct(string $message = "Editorial Live not found.", ?Exception $previous = null)
    {        
        parent::__construct($message, ErrorCodes::EDITORIAL_NOT_FOUND->value, $previous);
    }
}
