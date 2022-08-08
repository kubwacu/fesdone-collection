<?php
    namespace users\Controllers;

    require_once API_ROOT.'/res/users/models.php';
    require_once API_ROOT.'/res/users/serializers.php';

    use Akana\Response;
    use Akana\Utils;
    use users\Models\User;
    use users\Serializers\UserSerializer;

    // login/
    class LoginController{
        static public function post(){
            $user_auth = Utils::get_auth_user();
            return new Response(["token" => User::authenticate()]);
        }
    }