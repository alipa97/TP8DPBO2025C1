<?php
include_once("connection.php");
include_once("models/Student.class.php");
include_once("models/Major.class.php");
include_once("views/Student.view.php");
include_once("views/EditStudent.view.php");

class StudentController
{
    private $student;
    private $major;

    // Konstruktor
    function __construct()
    {
        $this->student = new Student(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->major = new Major(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // Menampilkan semua data student
    public function index()
    {
        $this->student->open();
        $this->major->open();

        $this->student->getStudents();
        $this->major->getMajors();

        $data = [
            'student' => [],
            'major' => []
        ];

        while ($row = $this->student->getResult()) {
            $data['student'][] = $row;
        }
        while ($row = $this->major->getResult()) {
            $data['major'][] = $row;
        }

        $this->student->close();
        $this->major->close();

        $view = new StudentView();
        $view->render($data);
    }

    // Menambahkan student baru
    public function add($data)
    {
        $this->student->open();
        $this->student->add($data);
        $this->student->close();

        header("Location: index.php");
    }

    // Tampilkan form edit berdasarkan ID
    public function showEditForm($id)
    {
        $this->student->open();
        $this->major->open();

        $studentData = $this->student->getById($id); // Ambil data student berdasarkan ID
        $majors = [];

        $this->major->getMajors();
        while ($row = $this->major->getResult()) {
            $majors[] = $row;
        }

        $this->student->close();
        $this->major->close();

        $view = new EditStudentView();
        $view->render($studentData, $majors);
    }

    // Proses update student
    public function update($id, $data)
    {
        $this->student->open();
        $this->student->update($id, $data);
        $this->student->close();

        header("Location: index.php");
    }

    // Menghapus student
    public function delete($id)
    {
        $this->student->open();
        $this->student->delete($id);
        $this->student->close();

        header("Location: index.php");
    }
}
