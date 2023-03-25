<?php

namespace App\Action;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

final class SendAction
{
    public function __invoke(Request $request, Response $response): Response
    {
        $response->getBody()->write('Hello');

        return $response->withHeader('Content-Type', 'application/json');
    }
}
