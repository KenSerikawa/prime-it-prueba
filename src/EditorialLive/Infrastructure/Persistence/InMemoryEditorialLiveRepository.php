<?php 

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Infrastructure\Persistence;

use ElConfidencial\EditorialLive\Domain\EditorialLive;
use ElConfidencial\EditorialLive\Domain\EditorialLiveRepository;
use ElConfidencial\Shared\Domain\EditorialId;

class InMemoryEditorialLiveRepository implements EditorialLiveRepository
{
    private array $storage = [];

    public function save(EditorialLive $editorialLive): void
    {
        $this->storage[$editorialLive->id()->value()] = $editorialLive;
    }

    public function findById(EditorialId $id): ?EditorialLive
    {
        return $this->storage[$id->value()] ?? null;
    }
}
