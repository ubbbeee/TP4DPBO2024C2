<?php

include_once "models/Template.php";
include_once "models/DB.php";
include_once "controllers/RolesController.php";

$role = new RolesController();

if (isset($_POST['submit'])) {
    $id = $_GET['id_edit'];
    if ($id != null) {
        $role->update($id, $_POST);
    } else {
        $role->tambah($_POST);
    }
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $role->delete($id);
} else if (isset($_GET['add'])) {
    $role->tambahForm();
} else if (isset($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $role->updateForm($id);
} else {
    $role->index();
}
