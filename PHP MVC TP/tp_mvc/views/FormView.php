<?php
  class FormView{
    public function render($data){
      $dataRole = null;
      foreach ($data as $row) {
      $dataRole .= "
        <option value='". $row['id_role'] ."'>" . $row['nama_role'] . "</option>
      ";
      }
      $tpl = new Template("templates/form.html");
      $title = "Tambah Member Baru";
      $tpl->replace("JUDUL_FORM", $title);
      $tpl->replace("DATA_ROLE", $dataRole);
      $tpl->write();
    }
    public function renderMember($data, $daftarRole){ 
      $dataRole = null;
      $selectedRole = $data['id_role']; // Dapatkan id_role yang terkait dengan data yang akan diedit
      foreach ($daftarRole as $row) {
          // Periksa jika id_role dalam opsi dropdown sama dengan id_role yang terkait dengan data yang akan diedit
          $selected = ($selectedRole == $row['id_role']) ? 'selected' : '';
          $dataRole .= "
              <option value='". $row['id_role'] ."' $selected>" . $row['nama_role'] . "</option>
          ";
      }
      $tpl = new Template("templates/form.html");
      $tpl->replace("DATA_NAME", $data['name']);
      $tpl->replace("DATA_EMAIL", $data['email']);
      $tpl->replace("DATA_PHONE", $data['phone']);
      $tpl->replace("DATA_DATE", $data['join_date']);
      $title = "Update Data Member";
      $tpl->replace("JUDUL_FORM", $title);
      $tpl->replace("DATA_ROLE", $dataRole);
      $tpl->write();
  }
  
    public function renderRole(){
      $tpl = new Template("templates/formRole.html");
      $title = "Tambah Role Baru";
      $tpl->replace("JUDUL_FORM_ROLE", $title);
      $tpl->write();
    }
    public function renderUpdateRole($data){
      $tpl = new Template("templates/formRole.html");
      $tpl->replace("DATA_NAME", $data['nama_role']);
      $title = "Update Data Role";
      $tpl->replace("JUDUL_FORM_ROLE", $title);
      $tpl->write();
    }
  }