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
			
			$sql = "SELECT * FROM person WHERE Nom = '$nom' and Prenom ='$prenom' and DateN = '$birthday'";
			$result = $db->query($sql);

			if ($result->num_rows > 0) {
			  echo "<p style='color:white;'>erreur</p><br>";
			  
			} else {
			  echo "Enregistrement <br>";
			  $sql2 = "INSERT INTO person (Nom, Prenom, DateN, sexe, email, num, adr) VALUES ('$nom', '$prenom', '$birthday', '$gender', '$email', '$phone', '$address')";
			  if($result2 = $db->query($sql2) === TRUE){
				  echo "<p style='color:white;'>Enregistrer </p><br>";
				  $sql = "SELECT ID FROM person WHERE Nom = '$nom' and Prenom ='$prenom' and DateN = '$birthday'";
				  $result = $db->query($sql);
				  while($row = $result->fetch_assoc()) {
					  echo "ID de " . $prenom . " " .$nom . "est" . $row["ID"] . "<br>";
				  echo "<a href='add.php?id=" . $row["ID"] . "&nom=" . $nom . "&prenom=" . $prenom . "'>Continuer";}
				  
			} else {
			echo "Error enregistrement </p><br>" . $db->error;  }
        } 
	
	}
	
	
	
	?>
