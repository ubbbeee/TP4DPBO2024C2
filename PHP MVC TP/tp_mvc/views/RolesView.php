<?php
  class RolesView{
    public function render($data){
      $title = "Data Role";
      $no = 1;
      $datarole = null;
      foreach($data as $val){
        list($id, $name) = $val;
            $datarole .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $name . "</td>
                    <td>
                    <a href='role.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
                    <a href='role.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
      }

      $tpl = new Template("templates/role.html");
      $tpl->replace("DATA_TABLE", $datarole);
      $tpl->replace("DATA_TITLE", $title);
      $tpl->write();
    }
  }