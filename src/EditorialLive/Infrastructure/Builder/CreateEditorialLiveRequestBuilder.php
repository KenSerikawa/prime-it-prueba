<?php

declare(strict_types=1);

namespace ElConfidencial\EditorialLive\Infrastructure\Builder;

use ElConfidencial\EditorialLive\Application\Create\CreateEditorialLiveRequest;
use Symfony\Component\HttpFoundation\Request;

class CreateEditorialLiveRequestBuilder
{
    public static function create(Request $request): CreateEditorialLiveRequest
    {
        $data = json_decode($request->getContent());
        return new CreateEditorialLiveRequest(
            $data->title, 
            $data->content, 
            filter_var($data->isLive, FILTER_VALIDATE_BOOLEAN),
        );
    }
}
