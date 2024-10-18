<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialNews\Domain;

use ElConfidencial\EditorialNews\Domain\WordCount;
use ElConfidencial\Shared\Domain\EditorialContent;
use ElConfidencial\Shared\Domain\EditorialTitle;
use ElConfidencial\Shared\Domain\EditorialId;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table('news')]
readonly class EditorialNews
{
    #[ORM\Embedded(WordCount::class)]
    private WordCount $wordCount;

    public function __construct(
        #[ORM\Embedded(EditorialId::class, columnPrefix: false)]
        private EditorialId $id,
        
        #[ORM\Embedded(EditorialTitle::class, columnPrefix: false)]
        private EditorialTitle $title, 
        
        #[ORM\Embedded(EditorialContent::class, columnPrefix: false)]
        private EditorialContent $content,
    ) {
        $this->countWords();
    }

    public function getId(): EditorialId
    {
        return $this->id;
    }

    public function getTitle(): EditorialTitle
    {
        return $this->title;
    }

    public function getContent(): EditorialContent
    {
        return $this->content;
    }

    private function countWords(): void
    {
        $this->wordCount = WordCount::countWordsInContent($this->content);
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title->value(),
            'content' => $this->content->value(),
            'wordCount' => $this->wordCount->value(),
        ];
    }

    public static function create(
        EditorialId $id,
        EditorialTitle $title,
        EditorialContent $content
    ):self {
        $editorialLive = new self(
            $id, $title, $content
        );

        return $editorialLive;
    }
}
