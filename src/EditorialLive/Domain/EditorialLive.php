<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Domain;

use Doctrine\ORM\Mapping as ORM;
use ElConfidencial\Shared\Domain\EditorialContent;
use ElConfidencial\Shared\Domain\EditorialId;
use ElConfidencial\Shared\Domain\EditorialTitle;

#[ORM\Entity()]
#[ORM\Table('editorial_lives')]
class EditorialLive
{
    public function __construct(
        #[ORM\Embedded(EditorialId::class, columnPrefix: false)]
        private readonly EditorialId $id,

        #[ORM\Embedded(EditorialTitle::class, columnPrefix: false)]
        protected EditorialTitle $title, 

        #[ORM\Embedded(EditorialContent::class, columnPrefix: false)]
        protected EditorialContent $content, 

        #[ORM\Embedded(EditorialIsLive::class, columnPrefix: false)]
        protected EditorialIsLive $isLive
    ) {
    }

    public static function create(
        EditorialId $id,
        EditorialTitle $title,
        EditorialContent $content,
        EditorialIsLive $isLive,
    ):self {
        $editorialLive = new self(
            $id, $title, $content, $isLive
        );

        // todo: record domain event

        return $editorialLive;
    }

    public function id(): EditorialId
    {
        return $this->id;
    }

    public function title(): EditorialTitle
    {
        return $this->title;
    }

    public function content(): EditorialContent
    {
        return $this->content;
    }

    public function isLive(): bool
    {
        return $this->isLive->value();
    }
}
