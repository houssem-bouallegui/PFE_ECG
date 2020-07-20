<!DOCTYPE html> 
<html>
<head>
	<link rel="stylesheet" type="text/css" href="mod.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
</head>
<body background="a.jpg">


<div class="header">

<center>ECG IDENTIFYING SYSTEM</center><i class="material-icons" style="font-size:30px;position:absolute;top:40px" onClick="parent.location='menu.html'">home</i>

</div>

<?php
      include('connexion.php');
      $sql="SELECT * from person";
		$result = $db->query($sql);
		if ($result->num_rows > 0) {
			echo "<center><h2>Résultat :</h2><br><form method='POST' action='mod.php'>";
			echo "<table><thead>";
			echo "<tr class='row100 head'><th class='cell100 column1'>ID</th><th class='cell100 column1'>Nom</th><th class='cell100 column1'>Prenom</th><th class='cell100 column1'>DateN</th><th class='cell100 column1'>sexe</th><th class='cell100 column1'>Email</th><th class='cell100 column1'>num</th><th class='cell100 column1'>adr</th><th class='cell100 column1'>dataset</th><th class='cell100 column1'>Selection</th></tr>";
				while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Nom'] . "</td><td>" . $row["Prenom"] . "</td><td>" . $row["DateN"] . "</td><td>" . $row["sexe"] .  "</td><td>" . $row["email"] . "</td><td>" . $row["num"] . "</td><td>" . $row["adr"] . "</td><td>" . $row["dataset"] . "</td><td><input type='radio' name='person' required value='" . $row['ID'] . "'></td></tr>";
			
			}
			echo "</table><input class='btn btn--radius-2 btn--blue' type='submit' value='Modifier' name='button1' ></form></center>";
		} else {echo "<p style='color:white;'>0 results</p>";}
			   
?>

</body>

</html>
