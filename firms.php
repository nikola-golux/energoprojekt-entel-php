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
<h1>Lista firmi</h1>
<p id="notice"></p>
  <table class="table">
    <thead>
      <tr class="row header blue">
        <th class="cell">ID</th>
        <th class="cell">Ime firme </th>
      </tr>
    </thead>
    <tbody>
      <?php
		$query = "SELECT * FROM `firms`";
        $pattern = array('id' => 'id', 'ime_firme' => 'ime_firme');
        $return = Database::ajaxCustomRequest($query, $pattern);

        foreach($return as $data) {
          echo '<tr class="row">
                  <td class="cell">'.$data['id'].'</td>
                  <td class="cell">'.$data['ime_firme'].'</td>
                </tr>';
        }
      ?>
    </tbody>
  </table>
  <hr>
	<a href="new-firm">Nova firma</a><br>
	<a href="history">Istorija promene firmi zaposlenih</a><br>
	<a href="firms">Lista firmi</a> 
</div>
</body>
</html>