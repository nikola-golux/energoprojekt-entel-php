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
<h1>Zaposleni</h1>
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
		$query = "SELECT employees.id, employees.f_name, employees.l_name, employees.zanimanje, firms.ime_firme FROM employees LEFT JOIN firms ON firms.id = employees.firm_id";
        $pattern = array(
            'id' => 'employee_id',
            'ime_firme' => 'ime_firme',
            'f_name' => 'f_name',
            'l_name' => 'l_name',
            'zanimanje' => 'zanimanje',
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