<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Request;
use Slim\Views\PhpRenderer;
use Throwable;

final class CallMeAction
{
    private $view;

    public function __construct(PhpRenderer $renderer)
    {
        $this->view = $renderer;
    }

    /**
     * @throws Throwable
     */
    public function __invoke(Request $request, ResponseInterface $response): ResponseInterface
    {
        $data = [];
        return $this->view->render($response, 'callMe.php', compact($data));
    }
}
