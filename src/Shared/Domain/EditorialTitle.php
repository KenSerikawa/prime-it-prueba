<?php 

declare(strict_types=1);

namespace ElConfidencial\Shared\Domain;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable()]
class EditorialTitle
{
    #[ORM\Column(name: 'title', type: 'string', length: 500)]
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException('EditorialTitle cannot be empty.');
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
