<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Infrastructure\Controller;

use ElConfidencial\EditorialLive\Application\EditorialLiveResponse;
use ElConfidencial\EditorialLive\Application\Find\EditorialLiveFinder;
use ElConfidencial\EditorialLive\Domain\Error\EditorialLiveNotFound;
use ElConfidencial\Shared\Domain\EditorialId;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GetEditorialLiveController extends AbstractController
{
    public function __construct(private readonly EditorialLiveFinder $finder)
    {
    }

    #[Route('/editorial-live/{id}', name: 'editorial_live_show', methods: ['GET'])]
    public function __invoke(Request $request, string $id): JsonResponse
    {
        // todo: create ExceptionListener to avoid try/catch blocks
        try {
            $editorialLive = $this->finder->__invoke(new EditorialId($id));

            $response = EditorialLiveResponse::fromAggregate($editorialLive);

            return new JsonResponse($response, Response::HTTP_OK);
        } catch (EditorialLiveNotFound $e) {
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_NOT_FOUND);
        }
    }
}
