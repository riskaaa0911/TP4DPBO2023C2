<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Profesi.class.php");
include_once("views/Member.view.php");
include_once("views/Form.view.php");

class MemberController {
  private $member;
  private $profesi;

  function __construct(){
    $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->profesi = new Profesi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->member->open();
    $this->member->getMemberJoin();
    $data = array();
    while($row = $this->member->getResult()){
      array_push($data, $row);
    }

    $this->member->close();

    $view = new MemberView();
    $view->render($data);
  }

  function form_add(){
    $this->profesi->open();
    $this->profesi->getProfesi();
    $data = array();
    while($row = $this->profesi->getResult()){
      array_push($data, $row);
    }

    $this->profesi->close();
    $view = new FormView();
    $view->render($data);
  }

  function form_edit($id){
    $this->member->open();
    $this->profesi->open();
    $this->member->getMemberbyId($id);
    $data = array();
    $data = $this->member->getResult();
    
    $this->profesi->getProfesi();
    $daftarProfesi = array();
    while($row = $this->profesi->getResult()){
      array_push($daftarProfesi, $row);
    }

    $this->member->close();
    $this->profesi->close();

    $view = new FormView();
    $view->render2($data, $daftarProfesi);
  }
  
  function add($data){
    $this->member->open();
    $this->member->addMember($data);
    $this->member->close();
    
    header("location:index.php");
  }

  function edit($id, $data){
    $this->member->open();
    $this->member->editMember($id, $data);
    $this->member->close();
    
    header("location:index.php");
  }

  function delete($id){
    $this->member->open();
    $this->member->deleteMember($id);
    $this->member->close();
    
    header("location:index.php");
  }


}