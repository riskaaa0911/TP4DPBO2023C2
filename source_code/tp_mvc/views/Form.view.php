<?php
  class FormView{
    public function render($data){
      $dataProfesi = null;
      foreach ($data as $row) {
      $dataProfesi .= "
        <option value='". $row['id_profesi'] ."'>" . $row['nama_profesi'] . "</option>
      ";
      }
      $tpl = new Template("templates/form.html");
      $title = "Create New Member";
      $tpl->replace("JUDUL_FORM", $title);
      $tpl->replace("DATA_PROFESI", $dataProfesi);
      $tpl->write();
    }
    public function render2($data, $daftarProfesi){ 
        $dataProfesi = null;
        foreach ($daftarProfesi as $row) {
        $dataProfesi .= "
          <option value='". $row['id_profesi'] ."'>" . $row['nama_profesi'] . "</option>
        ";
        }
        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_NAME", $data['name']);
        $tpl->replace("DATA_EMAIL", $data['email']);
        $tpl->replace("DATA_PHONE", $data['phone']);
        $title = "Edit Data Member";
        $tpl->replace("JUDUL_FORM", $title);
        $tpl->replace("DATA_PROFESI", $dataProfesi);
        $tpl->write();
    }
    public function render3(){
      $tpl = new Template("templates/form2.html");
      $title = "Creat New Profesi";
      $tpl->replace("JUDUL_FORM2", $title);
      $tpl->write();
    }
    public function render4($data){
      $tpl = new Template("templates/form2.html");
      $tpl->replace("DATA_NAME", $data['nama_profesi']);
      $title = "Edit Data Profesi";
      $tpl->replace("JUDUL_FORM2", $title);
      $tpl->write();
    }
  }