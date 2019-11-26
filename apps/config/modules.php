<?php
return array(
    'frs' => [
        'namespace' => 'Kel5\FRS',
        'webControllerNamespace' => 'Kel5\FRS\Controllers\Web',
        'apiControllerNamespace' => 'Kel5\FRS\Controllers\Api',
        'className' => 'Kel5\FRS\Module',
        'path' => APP_PATH . '/modules/frs/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'Frs',
        'defaultAction' => 'index'
    ],
);