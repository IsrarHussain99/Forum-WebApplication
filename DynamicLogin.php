<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dynamic Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div id="header">
		<a href="DynamicLogin.php" class="logo">
		
		</a>
		<ul id="navigation">
			<li class="selected">
				<a href="index.html">home</a>
			</li>
			<li>
				<a href="DynamicLogin">Dynamic login</a>
			</li>
			<li>
			<a href="UploadImages.php">Upload Image</a>
			</li>
			<li>
				<a href="basicLogin.php">Basic Login</a>
			</li>
			<li>
				<a href="displayingMessages.php">Opinions Page</a>
			</li>
		</ul>
	</div>
   
   <div id="body"><!-- Write your comments here -->
	<div>
				<h1>Dynamic Login</h1><br><!-- Write your comments here -->
                
    <!-- Login FORM PHP-->
    <?php

	$user = $_POST['username'];
	$pass = $_POST['password'];
	$id = $_GET['id'];
	

	$HostServer = "localhost";
	$HostUsername = "Stu319";
	$HostPassword = "Stu2936!";
	$HostDB = "stu319";

	$conn = new mysqli($HostServer, $HostUsername, $HostPassword, $HostDB);
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error); 
	}
	
if ($_POST["login"])
{
	$sql = "SELECT * FROM allusers WHERE user = '".$_POST['username']."'";
	$result = $conn->query($sql);
	$numrows = $result->num_rows;
	
	if($numrows == 0)
{
	echo "<div id= 'body'><p><strong>Username or password does not exist \n <strong></p> </div>";
}
else 	
{ 
$row = $result->fetch_assoc(); 
	if($_POST["password"] == $row['pass'])
	{ 
	echo "<div id= 'body'><p><strong>Login Successful<strong></p> </div>";
	}
	else 
	{
	echo "<div id= 'body'><p><strong>Password does not exist<strong></p> </div>";
	echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
			
	}
	
}
}

?>

<!-- REGISTER FORM PHP-->
<?php

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
if ($_POST["Register"])
{
	// setting a variable sql1 to to insert the data into the slots user,pass,email,name,age 
$sql1 = "INSERT INTO allusers (user, pass, email, name, age) VALUES ('" . $_POST['user']. "','" . $_POST['pass'] . "','" . $_POST['email'] . "','" . $_POST['name'] . "','" . $_POST['age'] . "')";
// if statement to check if the query is matching the sql1 
if ($conn->query($sql1) === TRUE) {
	echo "<div id= 'body'><p><strong>Registration Successful.<strong></p> </div>";
}
// else statement
else {
	// writes out an error message 
	echo "Error: "	. $sql1 . "<br>" . $conn->error;
}
}
// connection close 
$conn->close();
?>
<!-- showing what the database details are in text on the webpage -->
<h4>Username from database = israr</h4><br>
<h4>Password from database = israrh</h4>
</div>
<!-- this is the css implementated into the code to show it what to act upon.-->
    <div id="body">
			<div class = "container">
		
        <!--setup for the form with a method to POST. and an action as the php file.-->		
       <form action="DynamicLogin.php" method="POST">
       <!--the input fields for the username and password-->
       <b>Username: <br/>
       <input type="Text" name = "username" /><br/>
       <b>Password: </b><br/>
       <input type="password" name = "password" /><br/>
       <!-- login button -->
       <input type="submit" name="login" value"Login">
      
       </form>

			</div>
		</div>
	</div>
    
    <!-- REGISTER FORM HTML-->

    <div id="body">
			<div class = "container">
            <h1>REGISTER</h1><br><!-- tite called register -->
	<form action="DynamicLogin.php" method="POST">
    <!-- these are all showing the input fields created -->
 	Username: <br>
    <input type="text" Name="user"><br>
    Password: <br>
    <input type="text" Name="pass"><br>
    Email: <br>
    <input type="text" Name="email"><br>
    Name: <br>
    <input type="text" Name="name"><br>
    Age: <br>
    <input type="text" Name="age"><br>
    
    <!--this is the register button-->
    <input type="submit" name="Register" value="Submit"><br><br>
    
</form>
   





</body>
</html>
