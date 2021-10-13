<?php
    require '../env.php';

    define('ROOT', false);
    define('DEBUG', true);
    define('ROOT_CONTROLLER', [
        'file' => 'root.php', 'class' => '\App\RootController']
    );
    define('APP_RESOURCES', [
        'users',
        'login',
        'products',
        'orders',
        'messages'
    ]);
    define('DATABASE', [
        'type'      => DATABASE_TYPE,
        'host'      => DATABASE_HOST,
        'port'      => DATABASE_PORT,
        'name'      => DATABASE_NAME,
        'login'     => DATABASE_LOGIN,
        'password'  => DATABASE_PASSWORD]);
