<?php 

declare(strict_types=1);

namespace ElConfidencial\Shared\Domain\Errors;

enum ErrorCodes : int
{
    case INVALID_ARGUMENT      = 1000;
    case EDITORIAL_NOT_FOUND   = 1001;
    case EDITORIAL_NOT_CREATED = 1002;
}