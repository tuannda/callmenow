<?php

use DI\ContainerBuilder;
use DI\DependencyException;
use DI\NotFoundException;
use Slim\App;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $containerBuilder = new ContainerBuilder();

    // Add DI container definitions
    $containerBuilder->addDefinitions(__DIR__ . '/container.php');

    // Create DI container instance
    $container = $containerBuilder->build();
    // Create Slim App instance
    $app = $container->get(App::class);

    // Register routes
    (require __DIR__ . '/routes.php')($app);

    // Register middleware
    (require __DIR__ . '/middleware.php')($app);

    return $app;
} catch (Exception|DependencyException|NotFoundException $e) {
}





