<?php

$conn = new mysqli("localhost", "root", "", "covid19");

if($conn->connect_error){
	die("connection failed");
}

$username = $_POST["username"];
$password = $_POST["password"];
$number = preg_match('@[0-9]@', $password);
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(isset($username) && isset($password)){

	if(empty($username)){
		header("Location: index.php?blank=Username is required!");
		exit();
	}else if (empty($password)){
		header("Location: index.php?blank=Password is required!");
		exit();
	}else{
	header("Location: index.php");
	exit();}
}


$sql = mysqli_query($conn, "SELECT * from users WHERE username = '$username' and password = '$password'");

$row = mysqli_fetch_array($sql);

if($row > 0){
	?>
	<script>
		alert('Login successful');
	</script>
	
	<?php
}
else{
	header("Location: index.php?blank=False Credentials!");
	exit();
}








?>