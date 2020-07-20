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
			echo "<center><h2>Résultat :</h2><br><form method='POST' action='sup.php'><table>";
			echo "<tr><th>ID</th><th>Nom</th><th>Prenom</th><th>DateN</th><th>sexe</th><th>Email</th><th>num</th><th>adr</th><th>dataset</th><th>Selection</th></tr>";
		while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Nom'] . "</td><td>" . $row["Prenom"] . "</td><td>" . $row["DateN"] . "</td><td>" . $row["sexe"] .  "</td><td>" . $row["email"] . "</td><td>" . $row["num"] . "</td><td>" . $row["adr"] . "</td><td>" . $row["dataset"] . "</td><td><input type='radio' name='person' required value='" . $row['ID'] . "'></td></tr>";
			
			}
			echo "</table><input class='btn btn--radius-2 btn--blue' type='submit' value='Supprimer' name='button1' ></form></center>";
		} else {echo "<p style='color:white;'>0 results</p>";}
			   
?>

</body>

</html>
