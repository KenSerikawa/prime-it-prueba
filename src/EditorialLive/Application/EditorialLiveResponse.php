<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Application;

use ElConfidencial\EditorialLive\Domain\EditorialLive;

readonly class EditorialLiveResponse
{
    public function __construct(
        public string $id,
        public string $title,
        public string $content,
        public bool $isLive = false
    ) {
    }

    public static function fromAggregate(EditorialLive $editorialLive): self
    {
        return new self(
            $editorialLive->id()->value(),
            $editorialLive->title()->value(),
            $editorialLive->content()->value(),
            $editorialLive->isLive()
        );
    }

    public function toArray(): array
    {
        return [
            'id'      => $this->id,
            'title'   => $this->title,
            'content' => $this->content,
            'isLive'  => $this->isLive,
        ];
    }
}
