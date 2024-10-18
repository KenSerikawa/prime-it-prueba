<?php 

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Infrastructure\Persistence;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use ElConfidencial\EditorialLive\Domain\EditorialLive;
use ElConfidencial\EditorialLive\Domain\EditorialLiveRepository;
use ElConfidencial\Shared\Domain\EditorialId;

class DoctrineEditorialLiveRepository extends ServiceEntityRepository implements EditorialLiveRepository
{
    public function __construct(
        private ManagerRegistry $registry
    ) {
        parent::__construct($registry, EditorialLive::class);
    }

    public function save(EditorialLive $editorialLive): void
    {
        $this->persist($editorialLive);
        $this->flush();
    }

    public function findById(EditorialId $id): ?EditorialLive
    {
        return $this->find($id);
    }
}
