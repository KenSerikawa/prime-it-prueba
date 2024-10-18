<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialNews\Domain;

use ElConfidencial\Shared\Domain\EditorialContent;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable()]
class WordCount 
{
    public function __construct(
        #[ORM\Column(name: 'word_count', type: 'integer')]
        public int $value
    ) {
    }

    public function value(): int
    {
        return $this->value;
    }

    public static function countWordsInContent(EditorialContent $content): WordCount 
    {
        return new self(str_word_count($content->value()));
    }
}
