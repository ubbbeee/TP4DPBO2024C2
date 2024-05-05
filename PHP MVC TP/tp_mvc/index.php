<?php

include_once "models/Template.php";
include_once "models/DB.php";
include_once "controllers/MembersController.php";

$members = new MembersController();

if (isset($_POST['submit'])) {
    $id = $_GET['id_edit'];
    if ($id != null) {
        $members->update($id, $_POST);
    } else {
        $members->tambah($_POST);
    }
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $members->delete($id);
} else if (isset($_GET['add'])) {
    $members->tambahForm();
} else if (isset($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $members->updateForm($id);
} else {
    $members->index();
}
