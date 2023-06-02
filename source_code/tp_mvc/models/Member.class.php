<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMemberJoin()
    {
        $query = "SELECT * FROM members JOIN profesi ON members.id_profesi=profesi.id_profesi ORDER BY members.id";

        return $this->execute($query); 
    }

    function getMemberJoinById($id)
    {
        $query = "SELECT * FROM members JOIN profesi ON members.id_profesi=profesi.id_profesi WHERE id=$id";

        return $this->execute($query); 
    }
    
    function getMemberById($id)
    {
        $query = "SELECT * FROM members WHERE id='$id'";
        return $this->execute($query);
    }

    function addMember($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $id_profesi = $data['id_profesi'];

        $query = " INSERT INTO `members`(`name`, `email`, `phone`, id_profesi) VALUES ( '$name', '$email', '$phone', $id_profesi)";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function deleteMember($id)
    {
        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function editMember($id, $data) 
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $id_profesi = $data['id_profesi'];
        
        $query = "UPDATE members SET name='$name', email='$email', phone='$phone', id_profesi='$id_profesi' WHERE id='$id'";

        return $this->execute($query);
    }
}


?>