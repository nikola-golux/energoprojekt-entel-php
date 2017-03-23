<?php
  include "include/functions.php"
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Workspace</title>
    <link rel="stylesheet" media="all" href="css/css.css">
  </head>
<body>
<div class="wrapper">
<h1>Istorija promene firmi zaposlenih</h1>
<p id="notice"></p>
  <table class="table">
    <thead>
      <tr class="row header blue">
        <th class="cell">Ime</th>
        <th class="cell">Prezime</th>
        <th class="cell">Zanimanje</th>
        <th class="cell">Ime firme </th>
      </tr>
    </thead>

    <tbody>
      <?php
        $query = "SELECT x.employee_id, x.firm_id, e.id as `employ_id`, e.f_name, e.l_name, e.zanimanje, f.ime_firme FROM employees_x_firms x, employees e, firms f WHERE x.employee_id = e.id AND x.firm_id = f.id";
        $pattern = array(
            'employee_id' => 'employee_id',
            'firm_id' => 'firm_id',
            'employ_id' => 'employ_id',
            'f_name' => 'f_name',
            'l_name' => 'l_name',
            'zanimanje' => 'zanimanje',
            'ime_firme' => 'ime_firme',
        );
        $return = Database::ajaxCustomRequest($query, $pattern);

        foreach($return as $data) {
          echo '<tr class="row">
                  <td class="cell">'.$data['f_name'].'</td>
                  <td class="cell">'.$data['l_name'].'</td>
                  <td class="cell">'.$data['zanimanje'].'</td>
                  <td class="cell">'.$data['ime_firme'].'</td>
                </tr>';
        }
      ?>
      
    </tbody>
  </table>
  <hr>
  <a href="new-employee">Novi zaposleni</a><br>
  <a href="employees">Lista zaposlenih</a><br>
  <a href="firms">Lista firmi</a> 
</div>
</body>
</html>