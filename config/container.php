<?php

use App\Utility\Configuration;
use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

return [

    Configuration::class => function () {
        return new Configuration(require __DIR__ . '/settings.php');
    },

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);

        return AppFactory::create();
    },

    PhpRenderer::class => function (ContainerInterface $container) {
        $config = $container->get(Configuration::class);

        $phpRenderer = new PhpRenderer($config->getString('view.path'));

        $phpRenderer->setLayout($config->getString('view.layout'));

        return $phpRenderer;
    },

//    LoggerFactory::class => function (ContainerInterface $container) {
//        return new LoggerFactory($container->get(Configuration::class)->getArray('logger'));
//    },

//    Connection::class => function (ContainerInterface $container) {
//        $config = $container->get(Configuration::class);
//
//        return new Connection($config->getArray('db'));
//    },
];
