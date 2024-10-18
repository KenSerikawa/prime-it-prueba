<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialNews\Application\Find;

class EditorialNewsResponse
{
    public function __construct(
        public string $id,
        public string $title,
        public string $content,
        public int $countWords
    ) {}

    public static function fromAggregate($editorialNews): self
    {
        return new self(
            $editorialNews->getId()->toString(),
            $editorialNews->getTitle(),
            $editorialNews->getContent(),
            $editorialNews->countWords()
        );
    }
}
