<?php 

declare(strict_types=1);

namespace ElConfidencial\Infrastructure\Persistence;

use ElConfidencial\Domain\EditorialNews\EditorialNews;
use ElConfidencial\Domain\EditorialNews\EditorialNewsRepository;
use ElConfidencial\Shared\Domain\ValueObject\EditorialId;

class InMemoryEditorialNewsRepository implements EditorialNewsRepository
{
    private array $storage = [];

    public function save(EditorialNews $editorialNews): void
    {
        $this->storage[$editorialNews->getId()->value()] = $editorialNews;
    }

    public function findById(EditorialId $id): ?EditorialNews
    {
        return $this->storage[$id->value()] ?? null;
    }
}
