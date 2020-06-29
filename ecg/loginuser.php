<?php

echo '<html>';

$host = "localhost"; /* Host name */
$user = "id8999302_ecgcloud"; /* User */
$password = "ecgcloud"; /* Password */
$dbname = "id8999302_ecgcloud"; /* Database name */
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	   
	  $con = mysqli_connect($host, $user, $password,$dbname);
      // username and password sent from form 
	  $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,md5($_POST['password'])); 
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      
      // If result matched $username and $password, table row must be 1 row
		
      if($count == 1) {
		session_start();
        $_SESSION['username'] = $myusername;
		//echo '<script>alert("Session=$username");</script>';
		header("location: menu.html");
	  }
	  else
		echo '<script>alert("Invalid Credentials");</script>';
   }
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="w3.css">
	<link rel="stylesheet" href="login.css">
	<title>Login Page</title>
	

</head>
<body background="a.jpg">
<div class="login-page">
  <div class="form">
    </form>
    <form class="login-form">
      <label style="font-size:14px">Username</label> <input type="text" name="username" id="Admin" placeholder="Enter Username">
	  <label style="font-size:14px">Password</label> <input type="password" name="password" id="user_password" placeholder="Enter Password">
      <input type="submit">
    </form>
  </div>
</div>
</body>
</html>