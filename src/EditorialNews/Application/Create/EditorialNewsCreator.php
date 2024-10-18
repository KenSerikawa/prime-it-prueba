<?php 

declare(strict_types=1);

namespace ElConfidencial\EditorialNews\Application\Create;

use ElConfidencial\EditorialNews\Domain\EditorialNews;
use ElConfidencial\EditorialNews\Domain\EditorialNewsRepository;
use ElConfidencial\Shared\Domain\EditorialContent;
use ElConfidencial\Shared\Domain\EditorialId;
use ElConfidencial\Shared\Domain\EditorialTitle;

readonly class EditorialNewsCreator
{
    public function __construct(private EditorialNewsRepository $repository)
    {
    }

    public function __invoke(CreateEditorialNewsRequest $request): void
    {
        $id = $request->id ? new EditorialId($request->id) : EditorialId::random();
        $title = new EditorialTitle($request->title);
        $content = new EditorialContent($request->content); 

        $editorialNews = EditorialNews::create($id, $title, $content);
        
        $this->repository->save($editorialNews);
    }
}
