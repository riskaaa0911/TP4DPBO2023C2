<?php
  class ProfesiView{
    public function render($data){
      $no = 1;
      $dataprofesi = null;
      foreach($data as $val){
        list($id, $name) = $val;
            $dataprofesi .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $name . "</td>
                    <td>
                    <a href='profesi.php?id_edit=" . $id .  "' class='btn btn-success''>Edit</a>
                    <a href='profesi.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
      }

      $tpl = new Template("templates/profesi.html");
      $tpl->replace("DATA_TABLE", $dataprofesi);
      $tpl->write();
    }
  }