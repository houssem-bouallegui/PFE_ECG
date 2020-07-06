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
			  
			  echo "Modification <br>";
			  if($dataset == ""){
			  $sql2 = "UPDATE person SET Nom='$nom', Prenom='$prenom', DateN='$birthday', sexe='$gender', email='$email', num='$phone', adr='$address' WHERE ID='$id'";
			  } else {
			  $sql2 = "UPDATE person SET Nom='$nom', Prenom='$prenom', DateN='$birthday', sexe='$gender', email='$email', num='$phone', adr='$address', dataset='$dataset' WHERE ID='$id'";
			  }
			  if($result2 = $db->query($sql2) === TRUE){
				  echo "<p'>Enregistrer </p><br>";
				  echo "<a href='menu.html'>Continuer";
			} else {
			echo "Error Modification </p><br>" . $db->error;  }

	?>