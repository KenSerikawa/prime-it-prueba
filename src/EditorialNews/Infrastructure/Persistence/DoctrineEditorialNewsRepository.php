<?php 

declare(strict_types=1);

namespace ElConfidencial\EditorialNews\Infrastructure\Persistence;

use ElConfidencial\EditorialNews\Domain\EditorialNewsRepository;
use ElConfidencial\EditorialNews\Domain\EditorialNews;
use ElConfidencial\Shared\Domain\EditorialId;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineEditorialNewsRepository extends ServiceEntityRepository implements EditorialNewsRepository
{
    public function __construct(
        private ManagerRegistry $registry
    ) {
        parent::__construct($registry, EditorialNews::class);
    }

    public function findById(EditorialId $id): ?EditorialNews
    {
        return $this->find($id->value());
    }

    public function save(EditorialNews $editorialNews): void
    {
        $this->persist($editorialNews);
        $this->flush();
    }
}
