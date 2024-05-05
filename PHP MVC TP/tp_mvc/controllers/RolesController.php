<?php

include "conf.php";
include "models/Roles.php";
include "views/RolesView.php";
include "views/FormView.php";

class RolesController
{
    // Atribut
    private $role;

    // Constructor
    public function __construct()
    {
        $this->role = new Roles(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // untuk view member
    public function index()
    {
        $this->role->open();
        $this->role->getRole();

        $data = array();

        while ($row = $this->role->getResult()) {
            array_push($data, $row);
        }

        $this->role->close();

        $view = new RolesView();
        $view->render($data);
    }
    //untuk load view form tambah role
    public function tambahForm()
    {
        $view = new FormView();
        $view->renderRole();
    }
    //untuk load view update form role
    public function updateForm($id)
    {
        $this->role->open();
        $this->role->getRoleById($id);
        $data = array();
        $data = $this->role->getResult();
        $this->role->close();
        $view = new FormView();
        $view->renderUpdateRole($data);
    }

    // Delete data
    public function delete($id)
    {
        $this->role->open();
        $this->role->deleteRole($id);
        $this->role->close();
        header("location:role.php");
    }

    // Tambah Data
    public function tambah($data)
    {
        $this->role->open();
        $this->role->tambahRole($data);
        $this->role->close();
        header("location:role.php");
    }

    // Update Data
    public function update($id, $data)
    {
        $this->role->open();
        $this->role->updateRole($id, $data);
        $this->role->close();

        header("location:role.php");
    }
}
