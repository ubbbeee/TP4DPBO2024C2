<?php

include "conf.php";
include "models/Members.php";
include "models/Roles.php";
include "views/MembersView.php";
include "views/FormView.php";

class MembersController
{
    // Atribut
    private $members;
    private $role;

    // Constructor
    public function __construct()
    {
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->role = new Roles(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // untuk view member
    public function index()
    {
        $this->members->open();

        $this->members->getMemberJoin();

        $data = array();

        while ($row = $this->members->getResult()) {
            array_push($data, $row);
        }

        $this->members->close();

        $view = new MembersView();
        $view->render($data);
    }
    //untuk view form tambah
    public function tambahForm()
    {
        $this->role->open();
        $this->role->getRole();
        $data = array();
        while ($row = $this->role->getResult()) {
            array_push($data, $row);
        }

        $this->role->close();
        $view = new FormView();
        $view->render($data);
    }
    //untuk view form update
    function updateForm($id){
        $this->members->open();
        $this->role->open();
        $this->members->getMemberbyId($id);
        $data = array();
        $data = $this->members->getResult();
        
        $this->role->getRole();
        $daftarRole = array();
        while($row = $this->role->getResult()){
          array_push($daftarRole, $row);
        }
    
        $this->members->close();
        $this->role->close();
    
        $view = new FormView();
        $view->renderMember($data, $daftarRole);
      }

    // Delete data
    public function delete($id)
    {
        $this->members->open();
        $this->members->deleteMember($id);
        $this->members->close();

        header("location:index.php");
    }
    //tambah Data
    public function tambah($data)
    {

        $this->members->open();
        $this->members->tambahMember($data);
        $this->members->close();
        header("location:index.php");

    }
    //update data
    function update($id, $data){
        $this->members->open();
        $this->members->updateMember($id, $data);
        $this->members->close();
        
        header("location:index.php");
      }
}
