<?php
  class MemberView{
    public function render($data){
    $no = 1;
    $dataMember = null;
    foreach ($data as $val) {
        $dataMember .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $val['name'] . "</td>
                <td>" . $val['email'] . "</td>
                <td>" . $val['phone']. "</td>
                <td>" . $val['join_date'] . "</td>
                <td>" . $val['nama_profesi'] . "</td>
                <td>
                <a href='index.php?id_edit=" . $val['id'] . "' class='btn btn-success''>Edit</a>
                <a href='index.php?id_hapus=" . $val['id'] . "' class='btn btn-danger''>Hapus</a>
                </td>
                </tr>";
    }

    $tpl = new Template("templates/index.html");
    $tpl->replace("DATA_TABLE", $dataMember);
    $tpl->write();
    } 
  }