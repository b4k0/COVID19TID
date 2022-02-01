<?php  

$conn = new mysqli("localhost", "root", "", "covid19");

if($conn->connect_error){
	die("connection failed");
}

$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

if(isset($username) && isset($password) && isset($email)){

	if(empty($username)){
		header("Location: index.php?error=Username is required!");
		exit();
	}else if (empty($password)){
		header("Location: index.php?error=Password is required!");
		exit();
	}else if (empty($email)){
		header("Location: index.php?error=Email is required!");
		exit();
	}else{
		if(strlen($password) < 8 ) {
			header("Location: index.php?error=Password must be at least 8 characters in length!");
			exit();
		} else if(!$number){
			header("Location: index.php?error=Password must contain at least one number!");
			exit();
		}else if(!$uppercase){
			header("Location: index.php?error=Password must contain at least one upper case letter!");
			exit();
		}else if(!$lowercase){
			header("Location: index.php?error=Password must contain at least one lower case letter!");
			exit();
		}else if(!$specialChars){
			header("Location: index.php?error=Password must contain at least one special character!");
			exit();
		}else {
			$msg = "Your password is strong.";
		}
		
	}
}else{
	header("Location: index.php");
	exit();
}


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




















