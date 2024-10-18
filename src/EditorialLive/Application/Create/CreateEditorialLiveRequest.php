<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Application\Create;

readonly class CreateEditorialLiveRequest
{
    public function __construct(
        public string $title,
        public string $content,
        public bool $isLive = false,
        public ?string $id = null
    ) {}
}
