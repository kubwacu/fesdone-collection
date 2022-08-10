<?php
    /*
    * This file is part of the akana framework files.
    *
    * (c) Kubwacu Entreprise
    *
    * @author (kalculata) Huzaifa Nimushimirimana <nprincehuzaifa@gmail.com>
    *
    */
 
    define('API_ROOT', '..');

    require API_ROOT.'/config.php';
    require API_ROOT.'/src/status.php';  
    require_once API_ROOT.'/src/utils.php';
    require_once API_ROOT.'/src/database.php';
    require_once API_ROOT.'/src/exceptions.php';
    require_once API_ROOT.'/src/model.php';
    require_once API_ROOT.'/src/models/user.php';
    require_once API_ROOT.'/src/models/token.php';
    require_once API_ROOT.'/src/serializer.php';
    require_once API_ROOT.'/src/response.php';
    require_once API_ROOT.'/src/main.php';

    use Akana\Main;
    use Akana\Utils;

    define('URI',  $_SERVER['REQUEST_URI']);
    define('HTTP_VERB', strtolower($_SERVER['REQUEST_METHOD']));
    define('REQUEST', ['data'=>Utils::get_request_data()]);
    
    
    if(isset($_SERVER['HTTP_AUTHORIZATION'])){
        define('AUTH_USER_TOKEN', $_SERVER['HTTP_AUTHORIZATION']);
    }
    else{
        define('AUTH_USER_TOKEN', "");
    }
    
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: *');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');

    function main(){
        try{
            set_error_handler([Utils::class, 'stop_error_handler']);
            echo Main::execute(URI);
        } catch (Exception $e) {
            include_once(API_ROOT.'/src/errors_manager.php');
        }
    } main();
    
   