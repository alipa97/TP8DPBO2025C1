<?php

class EditMajorView
{
    public function render($majorData)
    {
        $id       = $majorData['id'];
        $name     = $majorData['name'];

        $tpl = new Template("templates/edit_major.html");
        $tpl->replace("MAJOR_ID", $id);
        $tpl->replace("MAJOR_NAME", $name);
        $tpl->write();
    }
}