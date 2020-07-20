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
	if(isset($_POST['button'])) { 
			
			$prenom=$_POST["prenom"];
			$nom=$_POST["nom"];
			$birthday=$_POST["birthday"];
			$gender=$_POST["gender"];
			$email=$_POST["email"];
			$phone=$_POST["phone"];
		    $address=$_POST["address"];
			echo "<div class='box'>";
			$sql = "SELECT * FROM person WHERE Nom = '$nom' and Prenom ='$prenom' and DateN = '$birthday'";
			$result = $db->query($sql);

			if ($result->num_rows > 0) {
			  echo "<p style='color:white;font-size:30px;'>erreur</p><br>";
			  
			} else {
			  echo "<p style='color:white;font-size:30px;'>Enregistrement </p><br>";
			  $sql2 = "INSERT INTO person (Nom, Prenom, DateN, sexe, email, num, adr) VALUES ('$nom', '$prenom', '$birthday', '$gender', '$email', '$phone', '$address')";
			  if($result2 = $db->query($sql2) === TRUE){
				  echo "<p style='color:white;font-size:30px;'>Enregistrer </p><br>";
				  $sql = "SELECT ID FROM person WHERE Nom = '$nom' and Prenom ='$prenom' and DateN = '$birthday'";
				  $result = $db->query($sql);
				  while($row = $result->fetch_assoc()) {
					  echo "<p style='color:white;font-size:30px;'>ID de " . $prenom . " " .$nom . " est " . $row["ID"] . "</p><br>";
				  echo "<a  style='color:white;font-size:30px;' href='add.php?id=" . $row["ID"] . "&nom=" . $nom . "&prenom=" . $prenom . "'>Continuer";}
				  
			} else {
			echo "<p style='color:white;font-size:30px;'>Error enregistrement </p><br>" . $db->error;  }
        } 
	echo "</div>";
	}
	
	
	
	?>
</body>

</html>
