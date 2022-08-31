<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once '../vendor/autoload.php';
require_once __DIR__. './services/FoodService.class.php';
require_once __DIR__. './services/IngredientsService.class.php';
require_once __DIR__. './services/ReservationsService.class.php';
require_once __DIR__. './services/EmailsService.class.php';
require_once __DIR__. './dao/AdminDao.class.php';

Flight::register('foodService', 'FoodService');
Flight::register('ingredientsService', 'IngredientsService');
Flight::register('reservationsService','ReservationsService');
Flight::register('emailsService','EmailsService');
Flight::register('adminDao', 'AdminDao');

Flight::map('error', function(Exception $ex){
    // Handle error
    Flight::json(['message' => $ex->getMessage()], 500);
});

/* utility function for reading query parameters from URL */
Flight::map('query', function($name, $default_value = NULL){
  $request = Flight::request();
  $query_param = @$request->query->getData()[$name];
  $query_param = $query_param ? $query_param : $default_value;
  return urldecode($query_param);
});

// middleware method for login
Flight::route('/*', function(){
  return TRUE;
  //perform JWT decode
  $path = Flight::request()->url;
  //if ($path == '/login' || $path == '/docs.json'|| $path == '/foods' || $path == '/reservations' || $path == '/email') return TRUE; // exclude login route from middleware

  $headers = getallheaders();
  if (@!$headers['Authorization']){
    Flight::json(["message" => "Authorization is missing"], 403);
    return FALSE;
  }else{
    try {
      $decoded = (array)JWT::decode($headers['Authorization'], new Key(Config::JWT_SECRET(), 'HS256'));
      Flight::set('user', $decoded);
      return TRUE;
    } catch (\Exception $e) {
      Flight::json(["message" => "Authorization token is not valid"], 403);
      return FALSE;
    }
  }
});

/* REST API documentation endpoint */
Flight::route('GET /docs.json', function(){
  $openapi = \OpenApi\scan('routes');
  header('Content-Type: application/json');
  echo $openapi ->toJson();
});

require_once __DIR__. '/routes/FoodRoutes.php';
require_once __DIR__. '/routes/IngredientsRoutes.php';
require_once __DIR__. '/routes/ReservationsRoutes.php';
require_once __DIR__. '/routes/EmailRoutes.php';
require_once __DIR__. '/routes/AdminRoutes.php';

Flight::start();
?>
