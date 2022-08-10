<?php
    define('ENDPOINTS', [
        '/' => ['UsersController', false],
        "/login/" =>  ["LoginController", false],
        '/(user_id:int)/' => ['ManageUserController', false],
    ]);