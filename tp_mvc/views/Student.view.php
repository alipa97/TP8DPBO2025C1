<?php

class StudentView
{
    public function render($data)
    {
        $no = 1;
        $dataSiswa = null;
        $dataMajor = null;

        foreach ($data['student'] as $val) {
            list($id, $name, $nim, $phone, $joinDate, $majorName) = $val;

            $dataSiswa .= "
                <tr>
                    <td class='text-center'>" . $no++ . "</td>
                    <td>" . $name . "</td>
                    <td>" . $nim . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $joinDate . "</td>
                    <td>" . $majorName . "</td>
                    <td class='text-center'>
                        <a href='index.php?id_edit=" . $id . "' class='btn btn-warning btn-sm mb-1'>Edit</a>
                        <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger btn-sm'>Hapus</a>
                    </td>
                </tr>
            ";
        }

        foreach ($data['major'] as $val) {
            list($id, $nama) = $val;
            $dataMajor .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        $tpl = new Template("templates/student.html"); 
        $tpl->replace("JUDUL", "Daftar Siswa");
        $tpl->replace("DATA_TABEL", $dataSiswa);
        $tpl->replace("OPTION", $dataMajor);
        $tpl->write();
    }
}
?>