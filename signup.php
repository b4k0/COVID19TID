<?php  

$conn = new mysqli("localhost", "root", "", "covid19");

if($conn->connect_error){
	die("connection failed");
}

$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];



$sql = "INSERT INTO users (email, username, password) 
VALUES ('$email','$username', '$password')";

if($conn->query($sql) === TRUE && !empty($username)  && !empty($password)){
	?>
	<script>
		alert('Values have been inserted');
	</script>
	<?php
}
else{
	?>
	<script>
		alert('Values did not insert');
	</script>
	<?php
}


?>




















