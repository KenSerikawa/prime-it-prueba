<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Infrastructure\Controller;

use InvalidArgumentException;

use ElConfidencial\EditorialLive\Application\Create\EditorialLiveCreator;
use ElConfidencial\EditorialLive\Infrastructure\Builder\CreateEditorialLiveRequestBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateEditorialLiveController extends AbstractController
{
    public function __construct(private readonly EditorialLiveCreator $creator)
    {
    }

    #[Route('/editorial-live', name: 'editorial_live_create', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        // todo: create ExceptionListener to avoid try/catch blocks
        try {
            $createEditorialLive = CreateEditorialLiveRequestBuilder::create($request);

            $this->creator->__invoke($createEditorialLive);

            return new JsonResponse([], Response::HTTP_CREATED);
        } catch (InvalidArgumentException $e) {
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
