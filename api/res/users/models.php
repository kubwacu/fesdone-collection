<?php
    namespace users\Models;

    use Akana\Model;

    class User extends Model{
        public $first_name;
        public $last_name;
        public $phone;
        public $email;
        public $password;
        public $created_at;

        static public $params = [
            'first_name' => ['type'=>'str', 'min_length'=> 3, 'max_length'=>50],
            'last_name' => ['type'=>'str', 'min_length'=> 3, 'max_length'=>50],
            'phone' => ['type'=> 'str', 'min_length'=> 8, 'max_length'=>30, 'nullable'=>true],
            'email' => ['type'=> 'email', 'max_length'=>50],
            'password' => ['type'=> 'str', 'min_length'=> 8, 'max_length'=>50],
            'created_at' => ['type'=> 'datetime', 'default'=> 'now'],
        ];
    }
