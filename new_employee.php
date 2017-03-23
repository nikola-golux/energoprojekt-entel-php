<?php
	include "include/functions.php";
  
	if(isset($_POST['ime_firme'])) {
		$query = "INSERT INTO `firms`(`ime_firme`) VALUES (:ime_firme)";
		$pattern = array(
			'ime_firme' => $_POST['ime_firme'],
		);
		$firm = Database::isertAndRerutnData($query, $pattern);

		$query = "INSERT INTO `employees`(`firm_id`,`f_name`,`l_name`,`zanimanje`) VALUES (:firm_id, :f_name, :l_name, :zanimanje)";
		$pattern = array(
			'firm_id' => $firm[0]['id'],
			'f_name' => $_POST['f_name'],
			'l_name' => $_POST['l_name'],
			'zanimanje' => $_POST['zanimanje'],
		);
		$employee = Database::isertAndRerutnData($query, $pattern);
		
		$query = "INSERT INTO `employees_x_firms`(`employee_id`,`firm_id`) VALUES (:employee_id, :firm_id)";
		$pattern = array(
			'employee_id' => $employee[0]['id'],
			'firm_id' => $firm[0]['id'],
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
				echo "<div class='msg'>Uspesno dodali zaposlenog.</div>";
			}
		}
		?>
		<form action="#" accept-charset="UTF-8" method="POST" name="new">
			<div class="field">
				<label for="f_name">Ime</label><br>
				<input type="text" name="f_name">
			</div>
			<div class="field">
				<label for="l_name">Prezime</label><br>
				<input type="text" name="l_name">
			</div>
			<div class="field">
				<label for="zanimanje">Zanimanje</label><br>
				<input type="text" name="zanimanje">
			</div>
			<div class="field">
				<label for="ime_firme">Ime Firme</label><br>
				<input type="text" name="ime_firme">
			</div>
			<div class="actions">
				<input type="submit" value="Create Employee" />
			</div>
		</form>
		
		
		<a href="history">Back</a>
	</div>
</body>
</html>