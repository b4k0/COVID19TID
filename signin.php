<?php

$conn = new mysqli("localhost", "root", "", "covid19");

if($conn->connect_error){
	die("connection failed");
}

$username = $_POST["username"];
$password = $_POST["password"];


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
	?>
	<script>
		alert('Login failed');
	</script>
	
	<?php
}








?>