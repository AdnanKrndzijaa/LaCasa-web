<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
* Checks admins crredentials 
*/
Flight::route('POST /login', function(){
  $login = Flight::request()->data->getData();
  $admin = Flight::adminDao()->get_by_email($login['email']);
      if (isset($admin['id'])){
        if($admin['password'] == md5($login['password'])){
          unset($admin['password']);
          $jwt = JWT::encode($admin, Config::JWT_SECRET(), 'HS256');
          Flight::json(['token' => $jwt]);
        }else{
          Flight::json(["message" => "Wrong password"], 404);
        }
      }else{
        Flight::json(["message" => "Admin doesn't exist"], 404);
      }
});

 ?>
