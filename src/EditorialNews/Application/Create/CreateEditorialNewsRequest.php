<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialNews\Application\Create;

readonly class CreateEditorialNewsRequest
{
    public function __construct(
        public string $title,
        public string $content,
        public ?string $id = null,
    ) {}
}
