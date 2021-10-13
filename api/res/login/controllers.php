<?php
    namespace login\Controllers;

    require '../res/users/models.php';

    use Akana\Response;
    use users\Models\User;

    class LoginController{
        static public function post(){
            $result = User::authenticate(REQUEST['data']);

            // return new Response([
            //     "token" => $result["token"]
            // ]);
            
            return new Response([
                "test ok"
            ]);
        }
    }
