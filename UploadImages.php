<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Upload Image</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>


<body>
<div id="header">
		<a href="UploadImages.php" class="logo">
			<img src="images/israrhussainlogo1.png" alt="">
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


<img src="<?php echo $target_file; ?>"/>
<form action="UploadImages.php" method="post" 
enctype="multipart/form-data">
Select image to upload: 
<input type="file" name="ImageUpload" id="ImageUpload">
<input type="submit" value="Upload" name="submit1">
<input type="submit" value="Delete all images" name="delete">
</form>
<?php
$server = "localhost";
$username = "Stu319";
$password = "Stu2936!";
$db = "stu319";


 // Create connection
$conn = new mysqli($servername, $username, $password, $db);
// checks connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}



$sql1 = "SELECT * FROM imagesuploaded";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) 
{
	while($row = $result1->fetch_assoc()) 
	{
		echo "<img src='". $row['ImgName'] ."' /><br />";
	}
}
else
{
	echo Error; 
}

if(isset($_POST["delete"])) 
{
mysqli_query("TRUNCATE FROM imagesuploaded");
header("Refresh:0");
echo ("deleted all images");
} 


// Image Upload

if(isset($_POST["submit1"])) 
{
	$directory = "imageuploads1/";
	if(!file_exists($directory))
	{
		mkdir ($directory, 0744);
	}
	
	$target_file = $directory.basename($_FILES["ImageUpload"]["name"]);
	
	if(move_uploaded_file($_FILES["ImageUpload"]["tmp_name"],$target_file)) 
	{
		echo  "The File ". basename($_FILES["ImageUpload"]["name"]). " has been uploaded. ";
		
		$sql = "INSERT INTO imagesuploaded (ImgName) VALUES ('" . $target_file. "')";
		if($conn->query($sql))
		{
			echo  "Added new file to database";
			header("Refresh:0");
		}
		else{
			echo "error writing to database";
		}
	
	}
	else {
		echo "Sorry, there was an error uploading your files.";
	}
}



/*$images = glob("{$dirname}*.png, {$dirname}*.jpeg");

foreach($images as $image) {
    echo '<img src="'.$image.'" /><br />';
}*/

 ?>
 



</body>
</html>