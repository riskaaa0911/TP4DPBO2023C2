<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Profesi.controller.php");

$profesi = new ProfesiController();

if (isset($_POST['submit'])) {
    $id = $_GET['id_edit'];
    if ($id != null) {
      $profesi->edit($id, $_POST);
    }
    else {
      //memanggil add
      $profesi->add($_POST);
    }
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $profesi->delete($id);
}
else if (isset($_GET['add'])) {
  //memanggil add
  $profesi->form_add();
}
else if (isset($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $profesi->form_edit($id);
}
else{
    $profesi->index();
}