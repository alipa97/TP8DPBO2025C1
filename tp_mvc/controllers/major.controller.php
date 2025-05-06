<?php
include_once("connection.php");
include_once("models/Major.class.php");
include_once("views/Major.view.php");
include_once("views/editMajor.view.php");

class MajorController
{
    private $major;

    function __construct()
    {
        $this->major = new Major(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->major->open();
        $this->major->getMajors();

        $data = array();
        while ($row = $this->major->getResult()) {
            array_push($data, $row);
        }

        $this->major->close();

        $view = new MajorView();
        $view->render($data);
    }

    public function add($data)
    {
        $this->major->open();
        $this->major->add($data);
        $this->major->close();

        header("Location: major.php");
    }

    public function showEditForm($id)
    {
        $this->major->open();
    
        // Ambil data major berdasarkan ID
        $majorData = $this->major->getById($id);
    
        $this->major->close();
    
        // Menampilkan form untuk mengedit major
        $view = new EditMajorView();
        $view->render($majorData);
    }    

    public function update($id, $data)
    {
        $this->major->open();
        $this->major->update($id, $data);
        $this->major->close();

        header("Location: major.php");
    }

    public function delete($id)
    {
        $this->major->open();
        $this->major->delete($id);
        $this->major->close();

        header("Location: major.php");
    }
}
