<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
// include_once("controllers/Student.controller.php");
include_once("controllers/Major.controller.php");

// $studentController = new StudentController();
$majorController = new MajorController();

// Proses menambah major
if (isset($_POST['add'])) {
    $data = [
        'name' => $_POST['name'],
    ];
    $majorController->add($data);
    header("Location: major.php");
} 
// Proses menghapus major
else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $majorController->delete($id);
    header("Location: major.php");
} 
// Proses mengedit major
else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $majorController->showEditForm($id);
}
else if (isset($_POST['update_major'])) {
    $id = $_POST['id'];
    $data = [
        'name' => $_POST['name'],
    ];
    $majorController->update($id, $data);
    header("Location: major.php");
}
// Menampilkan daftar major
else {
    $majorController->index();
}
?>
