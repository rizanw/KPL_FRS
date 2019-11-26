<?php

use Phalcon\Config;

return new Config(
    [
        'database' => [
            'adapter' => getenv('FRS_DB_ADAPTER'),
            'host' => getenv('FRS_DB_HOST'),
            'username' => getenv('FRS_DB_USERNAME'),
            'password' => getenv('FRS_DB_PASSWORD'),
            'dbname' => getenv('FRS_DB_NAME'),
        ], 
    ]
);
