<?php

declare(strict_types=1);

namespace ElConfidencial\Tests\EditorialLive\Application\Create;

use ElConfidencial\EditorialLive\Application\Create\CreateEditorialLiveRequest;
use ElConfidencial\EditorialLive\Application\Create\EditorialLiveCreator;
use ElConfidencial\EditorialLive\Domain\EditorialLiveRepository;
use ElConfidencial\Shared\Domain\EditorialContent;
use ElConfidencial\Shared\Domain\EditorialTitle;
use ElConfidencial\Tests\EditorialLive\Domain\EditorialLiveMother;
use PHPUnit\Framework\TestCase;

class EditorialLiveCreatorTest extends TestCase
{
    public function testCanCreate(): void
    {
        $repository = $this->createMock(EditorialLiveRepository::class);

        $expected = EditorialLiveMother::create(title: new EditorialTitle("Test Title"), content: new EditorialContent("Test Content"));

        $repository->expects($this->once())
            ->method('save')
            ->with($expected);

        $creator = new EditorialLiveCreator($repository);

        $creator->__invoke(
            new CreateEditorialLiveRequest(
                $expected->title()->value(),
                $expected->content()->value(),
                $expected->isLive(),
                $expected->id()->value()
            )
        );
    }
}
