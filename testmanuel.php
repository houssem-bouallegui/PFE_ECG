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
	echo $out2;
  
        } 
        if(isset($_POST['button4'])) { 
			$sql = "SELECT * FROM dataset";
			$result = $db->query($sql);

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
				echo "id: " . $row["id"]. " DATASET " . $row["dataset"] . "<br>";
			  }
			} else {
			  echo "<p style='color:white;'>0 results</p>";
			} 
        }
		     
        if(isset($_POST['button5'])) {
				shell_exec('cd /home/pi/PFE');
            echo "This is Button1 that is selected"; 
        } 	
		
		
		
    ?> 
<form method="post"> 
<div class="box">
<ol class="odd center">
  <li class="hex">
    <div class="hex-content"><center>Lancer le script d’acquisition<br>Temps :<input type="number" min="10" max="30" step="1" value="10" class="time" name="time" /><input type="submit" name="button1" value="Button1" id="test1" onclick="test1()" ></center></div>
  </li>
  <li class="hex">
    <div class="hex-content">Afficher la courbe ECG <br><center><i class="material-icons" style="font-size:30px">vpn_key</i></center><input type="button" name="button2" value="Button2" class="btn" onClick="parent.location='showdatagraph.html'"  ></div>
  </li>
  <li class="hex">
    <div class="hex-content">Lancer le traitement de DATASET <br><center><i class="material-icons" style="font-size:30px">vpn_key</i></center><input type="submit" name="button3" value="Button3"  ></div>
  </li>
  <li class="hex">
    <div class="hex-content">Afficher les DATASET <br><center><i class="material-icons" style="font-size:30px">vpn_key</i></center><input type="submit" name="button4" value="Button4"  ></div>
  </li>
  <li class="hex">
    <div class="hex-content">Comparaison des DATASET <br><center><i class="material-icons" style="font-size:30px">vpn_key</i></center><input type="submit" name="button5" value="Button5"  ></div>
  </li>
</ol> 
</div>
</form>





</body>
</html>
