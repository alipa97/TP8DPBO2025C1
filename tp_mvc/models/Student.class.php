<?php

class Student extends DB
{
    // Ambil semua student dan join dengan nama major
    function getStudents()
    {
        $query = "
            SELECT students.id, students.name, students.nim, students.phone, students.join_date, majors.name AS major 
            FROM students 
            JOIN majors ON students.major_id = majors.id
        ";
        return $this->execute($query);
    }

    // Tambah student
    function add($data)
    {
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $major_id = $data['major_id'];

        $query = "INSERT INTO students (name, nim, phone, join_date, major_id) 
                  VALUES ('$name', '$nim', '$phone', '$join_date', '$major_id')";

        return $this->execute($query);
    }

    // Hapus student berdasarkan ID
    function delete($id)
    {
        $query = "DELETE FROM students WHERE id = $id";
        return $this->execute($query);
    }

    public function getById($id)
    {
        $query = "SELECT students.id, students.name, students.nim, students.phone, students.join_date, students.major_id, majors.name AS majors_id, majors.name AS majors_name 
                  FROM students 
                  JOIN majors ON students.major_id = majors.id 
                  WHERE students.id = $id";
    
        $this->execute($query);
    
        return mysqli_fetch_assoc($this->result);
    }

    // Update data student berdasarkan ID
    function update($id, $data)
    {
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $major_id = $data['major_id'];

        $query = "UPDATE students SET 
                    name = '$name',
                    nim = '$nim',
                    phone = '$phone',
                    join_date = '$join_date',
                    major_id = '$major_id'
                  WHERE id = $id";

        return $this->execute($query);
    }
}