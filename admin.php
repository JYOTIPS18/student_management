<?php
include('connect.php');
session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($connection,$_POST['user_name']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE id = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($connection,$sql) or die("MySQL error: " . mysqli_error($connection) . "<hr>\nQuery: $sql");;
      $row = mysqli_fetch_array($result);
     
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register('myusername');
         $_SESSION['login_user'] = $myusername;
         
         header("location: admin/adminhome.php");
      }
	  else {
  $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}

   }
?>

<html>
<title>login</title>
<head>
<link rel="stylesheet" href="css/login.css">
</head>


<body>


<section class="login">
	<div class="titulo">Staff Login</div>
	<form method="POST" enctype="application/x-www-form-urlencoded">
    	<input type="text" placeholder="enter ID" name="user_name"  data-icon="U"  required>
        <input type="password" placeholder="Enter Password" name="password" required data-icon="x">
        <div class="olvido">
        	<div class="col"><a href="#" title="Ver Carásteres">change password</a></div>
            <div class="col"><a href="#" title="Recuperar Password">Forgot Password?</a></div>
        </div>
        <button type="submit" class="enviar">Submit</button>
    </form>
</section>
<center>
<a href="main.html">Back To Home Page</a></center>  

</body>

</html>