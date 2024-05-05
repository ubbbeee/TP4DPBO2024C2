
<?php

class Members extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members";

        return $this->execute($query);
    }

    function getMemberJoin()
    {
        $query = "SELECT * FROM members JOIN roles ON members.id_role=roles.id_role ORDER BY members.id";

        return $this->execute($query); 
    }

    function getMemberJoinById($id)
    {
        $query = "SELECT * FROM members JOIN roles ON members.id_role=roles.id_role WHERE id=$id";

        return $this->execute($query); 
    }

    function getMemberByID($id)
    {
        $query = "SELECT * FROM members WHERE id='$id'";

        return $this->execute($query);
    }

    function deleteMember($id)
    {
        $query = "DELETE FROM members WHERE id='$id'";

        return $this->execute($query);
    }

    function tambahMember($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_role = $data['id_role'];

        $query = "INSERT INTO members VALUES (NULL,'$name','$email','$phone', '$join_date', '$id_role')";

        return $this->execute($query);
    }

    function updateMember($id, $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_role = $data['id_role'];

        $query = "UPDATE members SET name ='$name', email = '$email', phone = '$phone', join_date = '$join_date', id_role = '$id_role' WHERE id='$id'";

        return $this->execute($query);
    }
}


?>
