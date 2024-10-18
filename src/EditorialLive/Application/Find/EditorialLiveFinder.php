<?php 

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Application\Find;

use ElConfidencial\EditorialLive\Domain\EditorialLive;
use ElConfidencial\EditorialLive\Domain\EditorialLiveRepository;
use ElConfidencial\EditorialLive\Domain\Error\EditorialLiveNotFound;
use ElConfidencial\Shared\Domain\EditorialId;

readonly class EditorialLiveFinder
{
    public function __construct(private EditorialLiveRepository $repository) {}

    public function __invoke(EditorialId $id): EditorialLive
    {        
        $editorialLive = $this->repository->findById($id);

        if (null === $editorialLive) {
            throw new EditorialLiveNotFound("Editorial Live with id: {$id->value()} not found.");
        }

        return $editorialLive;
    }
}
