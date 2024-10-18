<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialNews\Infrastructure\Controller;

use ElConfidencial\EditorialNews\Application\Find\EditorialNewsResponse;
use ElConfidencial\EditorialNews\Application\Create\CreateEditorialNewsRequest;
use ElConfidencial\EditorialNews\Application\Find\EditorialNewsFinder;
use ElConfidencial\EditorialNews\Domain\Error\EditorialNewsNotFound;
use ElConfidencial\Shared\Domain\EditorialId;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetEditorialNewsController extends AbstractController
{
    public function __construct(private EditorialNewsFinder $finder) {}

    #[Route('/editorial-news/{id}', name: 'editorial_news_show', methods: ['GET'])]
    public function __invoke(string $id): JsonResponse
    {
        try {
            $editorialNews = $this->finder->__invoke(new EditorialId($id));
            $response = EditorialNewsResponse::fromAggregate($editorialNews);

            return new JsonResponse($response, JsonResponse::HTTP_OK);
        } catch (EditorialNewsNotFound $e) {
            return new JsonResponse(['error' => $e->getMessage()], JsonResponse::HTTP_NOT_FOUND);
        }
    }
}
