<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Domain;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable()]
class EditorialIsLive
{
    public function __construct(
        #[ORM\Column(name: 'isLive', type: 'boolean')]
        public bool $value
    ) {
    }

    public function value(): bool
    {
        return $this->value;
    }
}
