<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Basic Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="header">
		<a href="index.html" class="logo">
			
		</a>
		<ul id="navigation">
			<li class="selected">
				<a href="index.html">home</a>
			</li>
			<li>
				<a href="basiclogin.php">Basic login</a>
			</li>
			<li>
			<a href="UploadImages.php">Upload Image</a>
			</li>
			<li>
				<a href="DynamicLogin.php">Dynamic Login</a>
			</li>
			<li>
				<a href="displayingMessages.php">Opinions Page</a>
			</li>
		</ul>
	</div>


	<div id="body">
	<div>
				<h1>Home</h1><br>
                <h4>Username = israr</h4><br>
                <h4>Email = israr@gmail.com</h4>
				<h4>Password = israr</h4>


<?php

$time = 10.00;
$currentTime;
$Stay = false;

if ($_SESSION['valid'] = true;)
		  session_start();
            if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) 
			{
				
               if ($_POST['username'] == 'israr' or $_POST['email'] == 'israr@gmail.com' && $_POST['password'] == 'israr') 
			   {
               // the username and password
                  $_SESSION['username'] = 'israr';
				  $_SESSION['email'] = 'israr@gmail.com';
				  
				   if (isset($_POST['StaySigned']))
				   {
					   $_SESSION['valid'] = true;
					   echo 'remembered';
					   echo 'correct!';
					   $_SESSION['timeout'] = time();
				   }
				   else{
		
                  echo 'correct!';	
				   }
		 			}
			   
			   else 
			   
			   {
                  $ShowMessage = 'Wrong username or password';
               }
            }
			
			if($_SESSION['valid'] == true)
			{
			echo "you're logged in as " . $_SESSION['username'];	
			}
			
			
			if(isset($_POST['logout']))
			{
					echo "you logged out";	
			$_SESSION['valid'] = false;
			header("Location: Login.php");	
			}
			
         ?>
      </div> 
      
      <div class = "container">
         <form action = "basiclogin.php" method = "POST">
      
         
            <h4 <?php echo $ShowMessage ;?></h4>
            
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "Login" 
               required autofocus></br>
               
               <input type = "text" class = "form-control" 
               name = "email" placeholder = "Email" 
               required autofocus></br>
               
            <input type = "password" class = "form-control"
               name = "password" placeholder = "Password" required></br>
               
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login NOW!</button>
               
               <button class = "btn btn-lg btn-primary btn-block" type = "button" 
               name = "logout">Logout!</button>
               
               <input type="checkbox" name="StaySigned" value="false" />Remember Me<br />
               
         </form>
         
      </div> 
      
   </body>
</html>