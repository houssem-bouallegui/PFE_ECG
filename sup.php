<?php
	include('connexion.php');
	
			$id=$_POST["person"];

			  
			  echo "Suppression <br>";
			  
			  $sql2 = "DELETE FROM person WHERE ID='$id'";

			  if($result2 = $db->query($sql2) === TRUE){
				  echo "<p'>Supprimer </p><br>";
				  echo "<a href='menu.html'>Continuer";
			} else {
			echo "Error Suppression </p><br>" . $db->error;  }

	?>