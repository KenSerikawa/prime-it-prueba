<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialNews\Infrastructure\Controller;

use ElConfidencial\EditorialNews\Application\Find\EditorialNewsResponse;
use ElConfidencial\EditorialNews\Application\Create\EditorialNewsCreator;
use ElConfidencial\EditorialNews\Infrastructure\Builder\CreateEditorialNewsRequestBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateEditorialNewsController extends AbstractController
{
    public function __construct(private EditorialNewsCreator $creator) {}

    #[Route('/editorial-news', name: 'editorial_news_create', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $createEditorialNews = CreateEditorialNewsRequestBuilder::create($request);

            $editorialNews = $this->creator->__invoke($createEditorialNews);
            
            $response = EditorialNewsResponse::fromAggregate($editorialNews);
    
            return new JsonResponse($response, JsonResponse::HTTP_CREATED);
        } catch (\InvalidArgumentException $e) {
            return new JsonResponse(['error' => $e->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
        }
    }
}
