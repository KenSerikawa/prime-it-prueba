<?php 

declare(strict_types=1);

namespace ElConfidencial\EditorialNews\Application\Find;

use ElConfidencial\EditorialLive\Domain\Error\EditorialLiveNotFound;
use ElConfidencial\EditorialNews\Domain\EditorialNewsRepository;
use ElConfidencial\EditorialNews\Domain\EditorialNews;
use ElConfidencial\Shared\Domain\EditorialId;

readonly class EditorialNewsFinder
{
    public function __construct(private EditorialNewsRepository $repository) {}

    public function __invoke(EditorialId $id): EditorialNews
    {        
        $editorialLive = $this->repository->findById($id);

        if (null === $editorialLive) {
            throw new EditorialLiveNotFound("Editorial Live with id: {$id->value()} not found.");
        }

        return $editorialLive;
    }
}
