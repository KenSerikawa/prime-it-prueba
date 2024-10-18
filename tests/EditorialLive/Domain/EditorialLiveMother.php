<?php

declare(strict_types=1);

namespace ElConfidencial\Tests\EditorialLive\Domain;

use ElConfidencial\EditorialLive\Domain\EditorialIsLive;
use ElConfidencial\EditorialLive\Domain\EditorialLive;
use ElConfidencial\Shared\Domain\EditorialContent;
use ElConfidencial\Shared\Domain\EditorialId;
use ElConfidencial\Shared\Domain\EditorialTitle;

class EditorialLiveMother
{
    public static function create(
        ?EditorialId $id = null,
        ?EditorialTitle $title = null,
        ?EditorialContent $content = null,
        ?EditorialIsLive $isLive = null
    ): EditorialLive {
        return EditorialLive::create(
            $id ?? EditorialId::random(),
            $title ?? new EditorialTitle("Random Title"),
            $content ?? new EditorialContent("Random Content"),
            $isLive ?? new EditorialIsLive(false)
        );
    }
}
