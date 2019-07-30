<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Opinions</title>
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
				<a href="Dynamiclogin.php">Dynamic login</a>
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
    <h1>Messageboard</h1><br><!-- text heading showing message board. -->
    
<?php
// connection data
$server = "localhost";
$username = "Stu319i";
$password = "Stu2936ii!";
$dbname = "stu319ii";
/// connection will try connect to the data above
$conn = new mysqli ($server, $username, $password, $dbname);
if($conn->connect_error) // if connection = error then show the connection failed message.
{ die("Connection failed: " . $conn->connect_error);
}


// checks when the button is pressed.
// it inserts the text in the "message" field into the database field called Message.
//it insert the users 'name' field text into the Name field of the database.
//it also saves the date and time.
if ($_POST["submit"]) 
{
	$sql = "INSERT INTO messageboard (Date, Name, Message) VALUES 
	('" . Date("Y/m/d") . "','" . $_POST['name'] . "','" .
	$_POST['message'] . "')";
	
	if($conn->query($sql) === TRUE) {
		// tells user new record is created
		echo "<p>New record created successfully</p>";
	} else {
		//shows an error if the new record did not create.
		echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
	}
}

if ($_GET['delete']){
		// this will delete the message on the webpage
	$sql = "DELETE FROM messageboard WHERE ID=" . $_GET['delete'];
	// checks for connection query $sql if it is === true.
	if ($conn->query($sql) === TRUE) {
		//displays the record deleted message for the user to see.
		echo "<p>Record deleted.</p>";
	} else {
		//this will show an error.
		echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
	}
}

if ($_POST["update"]){
	// this will update date name and message
	//this will set date to the new date and time. 
	//also allows the message and name to be changed which will effect the fields for the corresponding fields in the database.
	$sql = "UPDATE messageboard
			Set Date = '" . Date("Y/m/d") . "',
				Name = '" . $_POST ['name'] . "',
				Message ='" . $_POST['message'] . "'
			WHERE ID=" . $_GET['update'];
			// checks if the connection query ($sql) is equal to true. 
			//this will display the record edited successfully message
		if ($conn->query($sql) === TRUE) {
			echo "<p>Record edited successfully</p>";
		} else {
			// else shows an error and the reason. along with eding the connection.
			echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
		}
}


// this will select a message from the messageboard database.
$sql = "SELECT * FROM messageboard";
// the result will equal to the connection query ($sql) 
$result = $conn->query($sql);

// if the result of num_row is bigger than 0 then 
if($result->num_rows > 0)
{
	while ($row = $result->fetch_assoc()) {
		
	echo "<div class='row'>";
	// shows the name of the person who wrote the message
	echo "<p><strong>" . $row['Name'] . " says:</strong></p>";
	// shows
	echo "<p>" . $row['Message'] . "</p>";
	// shows the date when the post was made.
	echo "<p><em>Posted on: " . $row['Date'] . "</em></p>";
	
	echo "</div>";
	
	echo "<a href='displayingMessages.php?delete=" . $row['ID']."'>Delete Message</a>";
		// this will take the user to the update page
		echo "<a href='UpdateMessageboard.php?ID=".$row['ID']."'>Update Messages</a>";
}
//else statement (if sql does not return results)
} else {
	// tells the user that there are no records.
	echo "No Messages Found";
}


// closes the connection 
$conn->close();
?>

// 

<form action="displayingMessages.php" method="POST">
Name:<br>
<input type ="text" name="name"><br>
Message:<br>
<textarea name="message" rows="10" cols="50">

</textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

<form action="displayingMessages.php" method="post" 
enctype="multipart/form-data">
Select image to upload: 
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload Image" name="submit1">
<input type="submit" value="Delete" name="delete">
</form>

</body>
</html>

