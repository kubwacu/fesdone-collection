<?php
    namespace Akana\Models;

    use Akana\Model;

    class AkanaUser extends Model{
        public $username;
        public $password;

        static public $akana_user_model_params = [
            'username' => ['type'=>'str', 'min_length'=> 3, 'max_length'=>50],
            'password' => ['type'=> 'str', 'min_length'=> 8, 'max_length'=>50],
        ];
    }