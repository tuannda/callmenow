<?php

use Slim\App;
use App\Action\CallMeAction;
use App\Action\SendAction;

return function (App $app) {
    $app->get('/', CallMeAction::class);

    $app->post('/send', SendAction::class);
};
