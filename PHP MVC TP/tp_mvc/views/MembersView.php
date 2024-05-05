<?php

class MembersView
{
    public function render($data)
    {
        $title = "Data Member";
        $no = 1;
        $dataMember = null;
        foreach ($data as $val) {
            $dataMember .= "<tr>
              <td>" . $no++ . "</td>
              <td>" . $val['name'] . "</td>
              <td>" . $val['email'] . "</td>
              <td>" . $val['phone'] . "</td>
              <td>" . $val['join_date'] . "</td>
              <td>" . $val['nama_role'] . "</td>
              <td>
              <a href='index.php?id_edit=" . $val['id'] . "' class='btn btn-warning''>Edit</a>
              <a href='index.php?id_hapus=" . $val['id'] . "' class='btn btn-danger''>Hapus</a>
              </td>
              </tr>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABLE", $dataMember);
        $tpl->replace("DATA_TITLE", $title);
        $tpl->write();
    }
}
