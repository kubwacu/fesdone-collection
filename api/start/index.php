<?php
    /*
    * This file is part of the akana framework files.
    *
    * (c) Kubwacu Entreprise
    *
    * @author (kalculata) Huzaifa Nimushimirimana <nprincehuzaifa@gmail.com>
    *
    */
    require '../config.php';
    require '../src/status.php';  
    require_once '../src/utils.php';
    require_once '../src/database.php';
    require_once '../src/exceptions.php';
    require_once '../src/model.php';
    require_once '../src/models/user.php';
    require_once '../src/models/token.php';
    require_once '../src/serializer.php';
    require_once '../src/response.php';
    require_once '../src/main.php';

    use Akana\Main;
    use Akana\Utils;

    // if user use the bridge to communicate with the api
    if(isset($_GET['use_bridge']) && isset($_GET['uri']) && $_GET['use_bridge'] == 1 && isset($_GET['server']) && isset($_GET['data'])){
        define('URI',  $_GET['uri']);
        define('HTTP_VERB', strtolower($_GET['server']['REQUEST_METHOD']));
        define('REQUEST', ['data'=>json_decode($_GET['data'], true)]);
        
        if(isset($_GET['server']['HTTP_AUTHORIZATION'])){
            define('AUTH_USER_TOKEN', $_GET['server']['HTTP_AUTHORIZATION']);
        }
        else{
            define('AUTH_USER_TOKEN', "");
        }
        
    } else{
        define('URI',  $_SERVER['REQUEST_URI']);
        define('HTTP_VERB', strtolower($_SERVER['REQUEST_METHOD']));
        define('REQUEST', ['data'=>Utils::get_request_data()]);

        if(isset($_SERVER['HTTP_AUTHORIZATION'])){
            define('AUTH_USER_TOKEN', $_SERVER['HTTP_AUTHORIZATION']);
        }
        else{
            define('AUTH_USER_TOKEN', "");
        }
    }
    
    try{
        set_error_handler([Utils::class, 'stop_error_handler']);
        echo Main::execute(URI);
    } catch (Exception $e) {
        include_once('../src/errors_manager.php');
    }
   