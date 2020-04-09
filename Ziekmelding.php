<!doctype html>

<?php
include "Database.php"
?>

<?php
//Database connectie button verzenden
if(isset($_POST["btnVerzend"]))
{
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$location = $_POST['location'];
	$adress = $_POST['adress'];
	$class = $_POST['class'];
	$dateofbirth = $_POST['dateofbirth'];
	
	$query = "INSERT INTO registratie (firstname, surname, location, adress, class, dateofbirth)";
	$query .= "VALUES ('$firstname','$surname','$location','$adress','$class','$dateofbirth')";

	$stm = $con->prepare($query);
	
	if($stm->execute()){
		echo "";
	} else {
		echo "Het is mislukt!";
	}
}
?>

<?php
if(isset($_POST["btnOphalen"])){
	$query = "SELECT regID,firstname,surname FROM registratie ORDER BY regID DESC";
	$stm = $con->prepare($query);
		if ($stm->execute()) {
			$result = $stm->FetchAll(PDO::FETCH_OBJ);
		}
}
?>


<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS.css">
	
    <title>Registratie</title>
  </head>
  <body>
    
	
	<div class="widthdiv">
		<div class="container-fluid, containerhome">
			<div class="row">
				<div class="col-md-2 col-sm-4 col-xs-6 thumb"><a href="Homepagina.php"><button type="button" class="btn btn-primary">Homepagina</button></a></div>
				<div class="col-md-2 col-sm-4 col-xs-6 thumb"><a href="Registratie.php"><button type="button" class="btn btn-warning">Registratie</button></a></div>
				<div class="col-md-2 col-sm-4 col-xs-6 thumb"><a href="Ziekmelding.php"><button type="button" class="btn btn-success">Ziekmelding</button></a></button></div>	
				<div class="col-md-2 col-sm-4 col-xs-6 thumb"><a href="Betermelding.php"><button type="button" class="btn btn-primary">Betermelding</button></a></div>
				<div class="col-md-2 col-sm-4 col-xs-6 thumb"><a href="Overzichtziek.php"><button type="button" class="btn btn-warning">Ziekte Overzicht</button></a></div>
				<div class="col-md-2 col-sm-4 col-xs-6 thumb"><a href="Overzichtduur.php"><button type="button" class="btn btn-success">Duur Overzicht</button></a></div>	
			</div>
		</div>	
	</div>				
	<div>
	
		<form method="POST">
			<div class="form-row sickform">
				<div class="form-group col-md-2">
					<button type="Submit" name="btnOphalen" class="btn btn-primary sickbtn">Ophalen Studentgegevens</button>
					<select name="Student">
						<option>Select student</option>
							<?php
							while ($row = $result->fetch_all(PDO::FETCH_OBJ)) {
								echo "<option value='" . $row['regID'] . "'>'" . $row['firstname'] . "'</option>";
							}
							?>
					</select>
					<input type="text" class="form-control" name="student">
				</div>
				<div class="form-group col-md-2">
					<label>Vanaf</label>
					<input type="date" class="form-control" name="sickbegin">
				</div>
				<div class="form-group col-md-2">
					<label>Opmerking</label>
					<textarea class="form-control" name="comment"></textarea>
				</div>
			</div>
		  <button type="Submit" name="btnVerzend" class="btn btn-primary sickbtn">Ziekmelden</button>
		</form>	
	</div>
				
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>