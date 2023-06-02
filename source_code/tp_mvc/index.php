<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();

if (isset($_POST['submit'])) {
    $id = $_GET['id_edit'];
    if ($id != null) {
      $member->edit($id, $_POST);
    }
    else {
      //memanggil add
      $member->add($_POST);
    }
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $member->delete($id);
}
else if (isset($_GET['add'])) {
  //memanggil add
  $member->form_add();
}
else if (isset($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $member->form_edit($id);
}
else{
    $member->index();
}