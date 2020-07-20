<!DOCTYPE html> 

<html>
<head>
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
      $t=$_POST["time"];
	  $num=$_POST["num"]; 
      if(isset($_POST['button3'])) { 
		$ssh = new Net_SSH2('127.0.0.1');
	      if (!$ssh->login('pi', '123456789')) {
		  exit('Login Failed');
	      }
	
	$ssh->exec('cd /var/www/html && ./python.sh '.$t);     
	$out = $ssh->exec('cd /var/www/html && ./traitment.sh');
	$out2 = substr($out,4);
	echo "<p style='color:white;'>" . $out2 . "</p>";
	echo "<p style='color:white;'>num : " . $num . "</p>";
	if($num>=200){
		$n3=$num-200;
		$pres=100-$n3;}	
	else if($num>100){
		$n2=($num*10)-1000;
		$pres=1000-$n2;}
	else if($num<=100){
	$pres=11000-($num*100);}
	echo "<p style='color:white;'>press : " . $pres . "</p>";
	$sql = "SELECT dataset from person";
			  $result = $db->query($sql);
			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
				$d=$out2-$row["dataset"];
				echo "<p style='color:white;'>d : " . $d . "</p>";
				if ($d < 0){
					$d=$d*(-1);
					echo "<p style='color:white;'>d -1 :" . $d . "</p>";}
				if ($d<=$pres){
					
					$sql2="SELECT ID from person";
					$result = $db->query($sql2);
					if ($result->num_rows > 0) {
					while($row2 = $result->fetch_assoc()) {
						$id2=$row2["ID"];
						$sql3="SELECT * from person WHERE ID = '$id2'";
						$result = $db->query($sql3);
						if ($result->num_rows > 0) {
						while($row3 = $result->fetch_assoc()) {
							echo "<p style='color:white;'>id: " . $row3["ID"] . "<br> Nom  : " . $row3["Nom"] . " Prenom : " . $row3["Prenom"] . " <br>Dataset : " . $row3["dataset"] . "</p><br>";
						}
					} else { echo "<p style='color:white;'>no person</p>";}
				} 
			  } else { echo "<p style='color:white;'>no ID</p>";}		
			} else {echo "<p style='color:white;'>found person but not matching precision</p>";}
			  
		   }
		} else {echo "<p style='color:white;'>0 results</p>";}
	}
    
	?> 
<form method="post"> 
<div class="box" style="left:42%;">
<ol class="odd center">
  <li class="hex">
    <div class="hex-content">Reconnaisance Temps :<input type="number" min="10" max="30" step="1" value="10" class="time" name="time" />Precision :<input type="number" min="10" max="299" step="1" value="10" name="num" id="num" size="20" class="time" />%<i class="material-icons" style="font-size:25px">search</i><input type="submit" name="button3" value="Lancer"></div>
  </li>
</ol> 
</div>
</form>





</body>
</html>
 
