<?php
  include "include/functions.php";
  
  if(isset($_POST['ime_firme'])) {
	$query = "INSERT INTO `firms`(`ime_firme`) VALUES (:ime_firme)";
	$pattern = array(
		'ime_firme' => $_POST['ime_firme'],
	);
	$return = Database::ajaxUpdateRequest($query, $pattern);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Workspace</title>
    <link rel="stylesheet" media="all" href="css/css.css">
  </head>
<body>
	<div class="wrapper">
		<?php
		if(isset($return)) {
			if($return === true) {
				echo "<div class='msg'>Uspesno ste kreirali firmu.</div>";
			}
		}
		?>
		<form action="#" accept-charset="UTF-8" method="POST" name="new">
			<div class="field">
				<label for="ime_firme">Ime firme</label><br>
				<input type="text" name="ime_firme"/>
			</div>
			<div class="actions">
				<input type="submit" value="Create Firm" />
			</div>
		</form>
		
		
		<a href="firms">Back</a>
	</div>
</body>
</html>