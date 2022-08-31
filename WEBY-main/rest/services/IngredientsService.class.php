<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/IngredientsDao.class.php';

class IngredientsService extends BaseService{

  public function __construct(){
    parent::__construct(new ingredientsDao());
  }

}
?>
