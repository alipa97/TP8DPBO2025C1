<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Student.controller.php");
// include_once("controllers/Major.controller.php");

$studentController = new StudentController();
// $majorController = new MajorController();

// Proses menambah student
if (isset($_POST['add_student'])) {
    $data = [
        'name' => $_POST['name'],
        'nim' => $_POST['nim'],
        'phone' => $_POST['phone'],
        'join_date' => $_POST['join_date'],
        'major_id' => $_POST['major_id']
    ];
    $studentController->add($data);
    header("Location: index.php");
} 
// Proses menghapus student
else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $studentController->delete($id);
    header("Location: index.php");
} 
// Proses mengedit status student
else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $studentController->showEditForm($id); 
}
else if (isset($_POST['update_student'])) {
    $id = $_POST['id'];
    $data = [
        'name' => $_POST['name'],
        'nim' => $_POST['nim'],
        'phone' => $_POST['phone'],
        'join_date' => $_POST['join_date'],
        'major_id' => $_POST['major_id']
    ];
    $studentController->update($id, $data);
    header("Location: index.php");
}
// Menampilkan daftar student dan major
else {
    $studentController->index();
}
?>
