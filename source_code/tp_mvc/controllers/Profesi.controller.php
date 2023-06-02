<?php
include_once("conf.php");
include_once("models/Profesi.class.php");
include_once("views/Profesi.view.php");
include_once("views/Form.view.php");

class ProfesiController {
  private $profesi;

  function __construct(){
    $this->profesi = new Profesi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->profesi->open();
    $this->profesi->getProfesi();
    $data = array();
    while($row = $this->profesi->getResult()){
      array_push($data, $row);
    }

    $this->profesi->close();

    $view = new ProfesiView();
    $view->render($data);
  }

  function form_add(){
    $view = new FormView();
    $view->render3();
  }

  function form_edit($id){
    $this->profesi->open();
    $this->profesi->getProfesibyId($id);
    $data = array();
    $data = $this->profesi->getResult();
    $this->profesi->close();
    $view = new FormView();
    $view->render4($data);
  }
  
  function add($data){
    $this->profesi->open();
    $this->profesi->addProfesi($data);
    $this->profesi->close();
    
    header("location:profesi.php");
  }

  function edit($id, $data){
    $this->profesi->open();
    $this->profesi->editProfesi($id, $data);
    $this->profesi->close();
    
    header("location:profesi.php");
  }

  function delete($id){
    $this->profesi->open();
    $this->profesi->deleteProfesi($id);
    $this->profesi->close();
    
    header("location:profesi.php");
  }


}