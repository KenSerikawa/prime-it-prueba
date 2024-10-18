<?php

declare(strict_types=1);

namespace ElConfidencial\Shared\Domain;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable()]
class EditorialId extends Uuid
{    
}
