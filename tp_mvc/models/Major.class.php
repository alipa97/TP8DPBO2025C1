<?php

class Major extends DB
{
    function getMajors()
    {
        $query = "SELECT * FROM majors";
        return $this->execute($query);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM majors WHERE id = $id";
        
        $this->execute($query);
        return mysqli_fetch_assoc($this->result);
    }

    function add($data)
    {
        $name = $data['name'];
        $query = "INSERT INTO majors (name) VALUES ('$name')";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM majors WHERE id = $id";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $name = $data['name'];

        $query = "UPDATE majors SET name = '$name' WHERE id = $id";

        return $this->execute($query);
    }
}
