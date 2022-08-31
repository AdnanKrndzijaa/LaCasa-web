<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class AdminDao extends BaseDao{

  public function __construct(){
    parent::__construct("admins");
  }
  public function get_by_email($email){
    return $this->query_unique("SELECT * FROM admins WHERE email = :email", ["email"=> $email]);
  }
}
?>
