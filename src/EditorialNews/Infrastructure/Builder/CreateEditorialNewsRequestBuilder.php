<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialNews\Infrastructure\Builder;

use ElConfidencial\EditorialNews\Application\Create\CreateEditorialNewsRequest;
use Symfony\Component\HttpFoundation\Request;

class CreateEditorialNewsRequestBuilder
{
    public static function create(Request $request): CreateEditorialNewsRequest
    {
        $data = json_decode($request->getContent());
        return new CreateEditorialNewsRequest(
            $data->title, 
            $data->content,  
        );
    }
}
