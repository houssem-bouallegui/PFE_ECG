<?php
include('connexion.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM login WHERE User = '$myusername' and Pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        
         $_SESSION['login_user'] = $myusername;
         
         header("location: menu.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
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
    <form class="login-form" method="POST">
      <label style="font-size:14px">Username</label> <input type="text" name="username" id="username" placeholder="Enter Username">
	  <label style="font-size:14px">Password</label> <input type="password" name="password" id="password" placeholder="Enter Password">
      <input type="submit">
    </form>
  </div>
</div>
</body>
</html>