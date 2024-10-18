<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Domain;

use ElConfidencial\Shared\Domain\EditorialId;

interface EditorialLiveRepository
{
    public function save(EditorialLive $editorialLive): void;
    public function findById(EditorialId $id): ?EditorialLive;
}
