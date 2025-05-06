<?php

class MajorView
{
    public function render($data)
    {
        $no = 1;
        $dataMajor = null;

        foreach ($data as $val) {
            list($id, $major) = $val;

            $dataMajor .= "
                <tr>
                    <td class='text-center'>" . $no++ . "</td>
                    <td>" . $major . "</td>
                    <td class='text-center'>
                        <a href='major.php?id_edit=" . $id . "' class='btn btn-warning btn-sm mb-1'>Edit</a>
                        <a href='major.php?id_hapus=" . $id . "' class='btn btn-danger btn-sm'>Hapus</a>
                    </td>
                </tr>
            ";
        }

        $tpl = new Template("templates/major.html");
        $tpl->replace("JUDUL", "Daftar Jurusan");
        $tpl->replace("DATA_TABEL", $dataMajor);
        $tpl->write();
    }
}
?>