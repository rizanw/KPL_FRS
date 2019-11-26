<?php

namespace Kel5\FRS;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Kel5\FRS\Domain\Model' => __DIR__ . '/domain/model',
            'Kel5\FRS\Infrastructure' => __DIR__ . '/infrastructure',
            'Kel5\FRS\Application' => __DIR__ . '/application',
            'Kel5\FRS\Controllers\Web' => __DIR__ . '/controllers/web',
            'Kel5\FRS\Controllers\Api' => __DIR__ . '/controllers/api',
            'Kel5\FRS\Controllers\Validators' => __DIR__ . '/controllers/validators',
        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once __DIR__ . '/config/services.php';
    }

}