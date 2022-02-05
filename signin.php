<!-- HTML Code -->
<!DOCTYPE html>
<html>
<head>
	<title>COVID19 TID</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container" id="container">
	<?php

session_start();

$conn = new mysqli("localhost", "root", "", "covid19");

if($conn->connect_error){
	die("connection failed");
}

$username = $_POST["username"];
$password = $_POST["password"];



$sql = mysqli_query($conn, "SELECT * from users WHERE username = '$username' and password = '$password'");

$row = mysqli_fetch_array($sql);

if(isset($username) && isset($password)){

	if(empty($username) && empty($password)){
		header("Location: signin.php?error=Username and Password is required!");
		exit();
	}else if (empty($password)){
		header("Location: signin.php?error=Password is required!");
		exit();
	}else if(empty($username)){
		header("Location: signin.php?error=Username is required!");
		exit();
	}else{
		if($row > 0){
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			 if(isset($_SESSION["username"])){
			if ($username=="admin" && $password=="admin"){
				header("Location: Admin/adminDashboard.php");
				exit();
			}else{
				header("Location: User/userDashboard.php");
				exit();
			}
		}
		}
		else{
			header("Location: signin.php?error=False Credentials!");
			exit();
		}
	}
}
?>

<div class="form-container sign-in-container">
	<form action="signin.php" method="POST">
		<h1>Sign In</h1>
		<?php if (isset($_GET['error'])){ ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<br>
		<br>
		<br>
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<br>
		<button>Sign In</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-right">
			<h1>COVID19 TID</h1>
			<h1>Application</h1>
			<br>
			<h4>Web application for traffic inflation data for COVID-19 dispersion control.</h4>
			<br>
			<p>Do you want to visit any place with safety?</p>
			<a href="signup.php">
 			 <button>Sign up</button>
			</a>
		</div>
	</div>
</div>
</div>
<p class="text_center">2022 All rights reserved, COVID19 TID Application <a href="signin.php"></a></p>
 
</body>
</html>






























