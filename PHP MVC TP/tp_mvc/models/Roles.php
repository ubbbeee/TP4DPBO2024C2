<?php

class Roles extends DB{
    function getRole(){
        $query = "SELECT *, nama_role FROM roles";
        return $this->execute($query);
    }

    function getRoleById($id)
    {
        $query = "SELECT * FROM roles WHERE id_role = '$id'";
        return $this->execute($query);
    }

    function deleteRole($id)
    {
        $query = "DELETE FROM roles WHERE id_role='$id'";
        return $this->execute($query);
    }

    function tambahRole($data)
    {
        $nama_role = $data['nama_role'];

        $query = "INSERT INTO roles VALUES (NULL,'$nama_role')";

        return $this->execute($query);
    }

    function updateRole($id, $data)
    {
        $nama_role = $data['nama_role'];

        $query = "UPDATE roles SET nama_role = '$nama_role' WHERE id_role = $id";
        return $this->execute($query);
    }
}