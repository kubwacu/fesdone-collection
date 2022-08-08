<?php
    require API_ROOT.'/env.php';

    define('ROOT', false);
    define('DEBUG', true);
    define('ROOT_CONTROLLER', [
        'file' => 'root.php', 'class' => '\App\RootController']
    );
    define('APP_RESOURCES', [
        'users',
        'products',
        'orders',
        'messages'
    ]);
    define('AUTHENTIFICATION', [
        'file' => 'res\users\models.php',
        'model' => 'users\Models\User',
        'state' => true
    ]);
    define('DATABASE', [
        'type'      => DATABASE_TYPE,
        'host'      => DATABASE_HOST,
        'port'      => DATABASE_PORT,
        'name'      => DATABASE_NAME,
        'login'     => DATABASE_LOGIN,
        'password'  => DATABASE_PASSWORD
    ]);
    // define('ALLOW_ORGINS', 'ALL');
    define('ALLOW_ORGINS', [
        'http://127.0.0.1'
    ]);
    
