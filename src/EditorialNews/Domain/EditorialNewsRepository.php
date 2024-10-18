<?php

namespace ElConfidencial\EditorialNews\Domain;

use ElConfidencial\EditorialNews\Domain\EditorialNews;
use ElConfidencial\Shared\Domain\EditorialId;

interface EditorialNewsRepository
{
    public function save(EditorialNews $editorialNews): void;
    public function findById(EditorialId $id): ?EditorialNews;
}
