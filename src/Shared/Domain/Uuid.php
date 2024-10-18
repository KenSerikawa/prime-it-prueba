<?php

declare(strict_types=1);

namespace ElConfidencial\Shared\Domain;

use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;
use Stringable;
use Symfony\Component\Uid\Uuid as SymfonyUuid;

#[ORM\Embeddable()]
class Uuid implements Stringable
{
    public function __construct(
        #[ORM\Id]
        #[ORM\Column(name: 'id', type: 'guid')]
        protected string $value
    )
    {
        $this->ensureIsValidUuid($value);
    }

    public static function random(): static
    {
        return new static(SymfonyUuid::v4()->__toString());
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(?Uuid $other): bool
    {
        return !is_null($other) && $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function isValid(string $id): self
    {
        return new static($id);
    }

    private function ensureIsValidUuid(string $id): void
    {
        if (!SymfonyUuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }
}
