<!DOCTYPE html> 

<html>
<head>
	<link rel="stylesheet" type="text/css" href="testmanuel.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body background="a.jpg">
<br>
<div class="header">
	<center><p>PORTABLE ECG MONITORING</p></center>
</div>






<?php
      include('connexion.php');
      include('Net/SSH2.php'); 
        
        $id=$_GET["id"];
        $nom=$_GET["nom"];
        $prenom=$_GET["prenom"];
        echo "<p style='color:white;'>ID = " . $id . "</p>";
        echo "<p style='color:white;'> Nom = " . $nom . "</p>";
        echo "<p style='color:white;'> Prenom = " . $prenom . "</p>";
        if(isset($_POST['button1'])) { 
	      $ssh = new Net_SSH2('127.0.0.1');
	      if (!$ssh->login('pi', '123456789')) {
		  exit('Login Failed');
	      }
	$t=$_POST["time"];
	$ssh->exec('cd /var/www/html && ./python.sh '.$t);
	$out = $ssh->exec('cd /var/www/html && ./traitment.sh');
	$out2 = substr($out,4);
	echo $out2;
	$sql2 = "INSERT INTO dataset (ID, dataset) VALUES ('$id', '$out2')";
			  if($result2 = $db->query($sql2) === TRUE){
				  echo "<p style='color:white;'>Enregistrer </p><br>";
			} else {
			echo "<p style='color:white;'>Error enregistrement </p><br>" . $db->error;  }
	}
	?> 
<form method="post"> 
<div class="box">
<ol class="odd center">
  <li class="hex">
    <div class="hex-content"><center>Enregistrer <br>Temps :<input type="number" min="10" max="30" step="1" value="10" class="time" name="time" /><center><i class="material-icons" style="font-size:36px">cloud_upload</i></center><input type="submit" name="button1" value="Button1"  ></center></div>
  </li>
</ol> 
</div>
</form>





</body>
</html>
