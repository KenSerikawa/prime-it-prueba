<?php 

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Application\Create;

use ElConfidencial\EditorialLive\Domain\EditorialIsLive;
use ElConfidencial\EditorialLive\Domain\EditorialLive;
use ElConfidencial\EditorialLive\Domain\EditorialLiveRepository;
use ElConfidencial\Shared\Domain\EditorialContent;
use ElConfidencial\Shared\Domain\EditorialId;
use ElConfidencial\Shared\Domain\EditorialTitle;

readonly class EditorialLiveCreator
{
    public function __construct(private EditorialLiveRepository $repository)
    {
    }

    public function __invoke(CreateEditorialLiveRequest $request): void
    {
        $id = $request->id ? new EditorialId($request->id) : EditorialId::random();
        $title = new EditorialTitle($request->title);
        $content = new EditorialContent($request->content);
        $isLive = new EditorialIsLive($request->isLive);

        $editorialLive = EditorialLive::create($id, $title, $content, $isLive);
        
        $this->repository->save($editorialLive);
    }
}
