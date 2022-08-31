<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/ReservationsDao.class.php';

class ReservationsService extends BaseService{
  public $dao;

  public function __construct(){
    parent::__construct(new ReservationsDao());
    $this->dao = new ReservationsDao();
  }

  public function add($entity){
    $entity['date'] = date('Y-m-d', strtotime($entity['date']));
    $entity['time'] = date('H:i:s', strtotime($entity['time']));
    return $this->dao->add($entity);
  }

}
?>
