<?php

class Profesi extends DB
{
    function getProfesi()
    {
        $query = "SELECT * FROM profesi";
        return $this->execute($query);
    }
    
    function getProfesiById($id)
    {
        $query = "SELECT * FROM profesi WHERE id_profesi='$id'";
        return $this->execute($query);
    }

    function addProfesi($data)
    {
        $name = $data['name'];

        $query = " INSERT INTO `profesi`(`nama_profesi`) VALUES ( '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function deleteProfesi($id)
    {
        $query = "delete FROM profesi WHERE id_profesi = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function editProfesi($id, $data) 
    {
        $name = $data['name'];
        
        $query = "UPDATE profesi SET nama_profesi='$name' WHERE id_profesi='$id'";

        return $this->execute($query);
    }
}


?>