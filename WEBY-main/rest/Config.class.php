<?php

class Config {

  public static function DB_HOST(){
    return Config::get_env("DB_HOST", "localhost");
  }
  public static function DB_USERNAME(){
    return Config::get_env("DB_USERNAME", "AdnanDzindo");
  }
  public static function DB_PASSWORD(){
    return Config::get_env("DB_PASSWORD", "SQLAdnan251");
  }
  public static function DB_SCHEME(){
    return Config::get_env("DB_SCHEME", "weby_db");
  }
  public static function DB_PORT(){
    return Config::get_env("DB_PORT", "3306");
  }
  public static function JWT_SECRET(){
    return Config::get_env("JWT_SECRET", "4XVZkOJmP2");
  }

  public static function get_env($name, $default){
   return isset($_ENV[$name]) && trim($_ENV[$name]) != '' ? $_ENV[$name] : $default;
  }
}

?>
