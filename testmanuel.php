<!DOCTYPE html> 

<html>
<head>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<link rel="stylesheet" type="text/css" href="testmanuel.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body background="a.jpg">
<br>
<div class="header">
  <center>ECG IDENTIFYING SYSTEM</center><i class="material-icons" style="font-size:30px;position:absolute;top:40px" onClick="parent.location='menu.html'">home</i>
</div>

<?php
      include('connexion.php');
      include('Net/SSH2.php');  
        if(isset($_POST['button1'])) { 
	      $ssh = new Net_SSH2('127.0.0.1');
	      if (!$ssh->login('pi', '123456789')) {
		  exit('Login Failed');
	      }
	$t=$_POST["time"];
	$ssh->exec('cd /var/www/html && ./python.sh '.$t);

        } 
		     
        if(isset($_POST['button3'])) { 
		$ssh = new Net_SSH2('127.0.0.1');
	      if (!$ssh->login('pi', '123456789')) {
		  exit('Login Failed');
	      }
	$out = $ssh->exec('cd /var/www/html && ./traitment.sh');
	$out2 = substr($out,4);
	echo  "<p style='color:white;font-size: 20px;'>" . $out2 . "</p>";
  
        } 
        if(isset($_POST['button4'])) { 
			$sql = "SELECT ID,dataset FROM person";
			$result = $db->query($sql);

			if ($result->num_rows > 0) {
			  // output data of each row
			  
			  while($row = $result->fetch_assoc()) {
				echo "<p style='color:white;font-size:20px;'>ID : " . $row["ID"]. ", Dataset : " . $row["dataset"] . "</p>";
			  }
			  
			} else {
			  echo "<p style='color:white;font-size: 20px;'>0 results</p>";
			} 
        }
?> 
<form method="post"> 
<div class="box">
<ol class="odd center">
  <li class="hex">
    <div class="hex-content"><center>Lancer le script d’acquisition<br>Temps :<input type="number" min="10" max="30" step="1" value="10" class="time" name="time" /><input type="submit" name="button1" value="Ok" id="test1" onclick="test1()" ></center></div>
  </li>
  <li class="hex">
    <div class="hex-content">Afficher la courbe ECG <br><center><i class="material-icons" style="font-size:30px">assessment</i></center><input type="button" name="button2" value="Afficher" class="btn" onClick="parent.location='showdatagraph.html'"  ></div>
  </li>
  <li class="hex">
    <div class="hex-content">Lancer le traitement DATASET<center><i class="material-icons" style="font-size:30px">chevron_right</i></center><input type="submit" name="button3" value="ok"  ></div>
  </li>
  <li class="hex">
    <div class="hex-content">Afficher les DATASET <br><center><i class="material-icons" style="font-size:30px">storage</i></center><input type="submit" name="button4" value="Afficher"  ></div>
  </li>
</ol> 
</div>
</form>

</body>
</html>
