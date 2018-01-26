<?php
include('connect.php');
session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($connection,$_POST['user_name']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
      
      $sql = "SELECT user_name FROM login WHERE user_name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($connection,$sql) or die("MySQL error: " . mysqli_error($connection) . "<hr>\nQuery: $sql");;
      $row = mysqli_fetch_array($result);
     
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register('myusername');
         $_SESSION['login_user'] = $myusername;
         
         header("location: home.php");
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
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/radius.js"></script>
</head>

<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="main.html">ONLINE <span>REGISTRATION</span></a> <small>NIT Calicut</small></h1>
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
          <ul>
          <li class="active"><a href="main.html">Home</a></li>
          <li><a href="instruction.html">Instruction</a></li>
          <li><a href="contact.html">Contact</a></li>
		   <li><a href="register.php">Register</a></li>
          <li><a href="login.php">LOGIN</a></li>
        </ul>
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
            </span>
            <input name="button_search" src="images/search_btn.gif" class="button_search" type="image" />
          </form>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize"> <img src="images/nitc.jpg" width="958" height="245" alt="" class="hbg_img" />
      <div class="mainbar">
        <div class="article">
		
		
		
		
<section class="login">
	<div class="titulo">Student Login</div>
	<form method="POST" enctype="application/x-www-form-urlencoded">
    	<input type="text" placeholder="enter Username" name="user_name"  data-icon="U"  required>
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
</div>
</div>



<div class="sidebar">
        <div class="gadget">
          <h2 class="star"><span>MAIN</span> Menu</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <li><a href="http://www.dss.nitc.ac.in/">DSS</a></li>
            <li><a href="http://www.nitc.ac.in/index.php/?url=department/index">DEPARTMENT</a></li>
            <li><a href="http://www.nitc.ac.in/index.php/?url=content/index/1247/2/168/168">NITC HOSTELS</a></li>
            <li><a href="http://www.library.nitc.ac.in/">LIBRARY</a></li>
            <li><a href="http://www.nitc.ac.in/index.php/?url=content/index/3696/2/4024/4024">CONTACT</a></li>
          </ul>
        </div>
        <div class="gadget">
          <h2 class="star"><span>QUICK LINK</span></h2>
          <div class="clr"></div>
           <ul class="ex_menu">
		      <li><a href="https://www.onlinesbi.com/prelogin/icollecthome.htm">ONLINE PAYMENT</a><br />
           Through sbi collect make payment</li>
			<li><a href="faculty.php">FACULTY LOGIN</a><br />
              To digital sign by faculty in Pre-registration</li>
           
            <li><a href="lateregis.html">LATE REGISTRATION</a><br />
          student who do late registration</li>           
		   <li><a href="admin.php">ADMIN</a><br />
               TO Manage no-dues</li>
          
        
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; <a href="#">JYOTI PANDEY</a>. All Rights Reserved</p>
      <p class="rf">VISIT <a target="_blank" href="http://www.nitc.ac.in/">NITC MAIN WEBSITE</a></p>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</body>

</html>