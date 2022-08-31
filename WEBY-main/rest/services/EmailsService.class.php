<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/EmailDao.class.php';

class EmailsService extends BaseService{

  public function __construct(){
    parent::__construct(new EmailDao());
  }

}
?>
