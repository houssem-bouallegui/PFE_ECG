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
	
			$id=$_POST["id"];
			$prenom=$_POST["prenom"];
			$nom=$_POST["nom"];
			$birthday=$_POST["birthday"];
			$gender=$_POST["gender"];
			$email=$_POST["email"];
			$phone=$_POST["phone"];
		    $address=$_POST["address"];
			$dataset=$_POST["dataset"];
			  echo "<div class='box'>";
			  echo "<p style='color:white;font-size:30px;opacity:1;'>Modification </p><br>";
			  if($dataset == ""){
			  $sql2 = "UPDATE person SET Nom='$nom', Prenom='$prenom', DateN='$birthday', sexe='$gender', email='$email', num='$phone', adr='$address' WHERE ID='$id'";
			  } else {
			  $sql2 = "UPDATE person SET Nom='$nom', Prenom='$prenom', DateN='$birthday', sexe='$gender', email='$email', num='$phone', adr='$address', dataset='$dataset' WHERE ID='$id'";
			  }
			  if($result2 = $db->query($sql2) === TRUE){
				  echo "<p style='color:white;font-size:30px;opacity:1;'>Enregistrer </p><br>";
				  echo "<a  style='color:white;font-size:30px;opacity:1;' href='menu.html'>Continuer";
			} else {
			echo "<p style='color:white;font-size:30px;opacity:1;'>Error Modification </p><br>" . $db->error;  }
			echo "</div>";
	?>

</body>

</html>
