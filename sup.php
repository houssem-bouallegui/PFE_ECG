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
	
			$id=$_POST["person"];

			  echo "<div class='box'>";
			  echo "<p style='color:white;font-size:30px;'>Suppression </p><br>";
			  
			  $sql2 = "DELETE FROM person WHERE ID='$id'";

			  if($result2 = $db->query($sql2) === TRUE){
				  echo "<p style='color:white;font-size:30px;'>Supprimer </p><br>";
				  echo "<a  style='color:white;font-size:30px;' href='menu.html'>Continuer";
			} else {
			echo "<p style='color:white;font-size:30px;'> Error Suppression </p><br>" . $db->error;  }
			echo "</div>";
	?>

</body>

</html>
