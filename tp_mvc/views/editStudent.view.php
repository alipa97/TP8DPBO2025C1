<?php

class EditStudentView
{
    public function render($studentData, $majorData)
    {
        $id         = $studentData['id'];
        $name       = $studentData['name'];
        $nim        = $studentData['nim'];
        $phone      = $studentData['phone'];
        $joinDate   = $studentData['join_date'];
        $major_id   = $studentData['major_id'];

        $dataMajor = '';
        foreach ($majorData as $val) {
            list($id_major, $nama_major) = $val;
            $selected = ($id_major == $major_id) ? "selected" : "";
            $dataMajor .= "<option value='$id_major' $selected>$nama_major</option>";
        }

        $tpl = new Template("templates/edit_student.html");
        $tpl->replace("STUDENT_ID", $id);
        $tpl->replace("STUDENT_NAME", $name);
        $tpl->replace("STUDENT_NIM", $nim);
        $tpl->replace("STUDENT_PHONE", $phone);
        $tpl->replace("STUDENT_JOIN_DATE", $joinDate);
        $tpl->replace("OPTION_SELECTED", $dataMajor);
        $tpl->write();
    }
}