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
<div class="form-container sign-up-container">

<form action="signup.php" method="POST" >
	<h1>Create Account</h1>
	<?php if (isset($_GET['error'])){ ?>
		<p class="error"><?php echo $_GET['error']; ?></p>
	<?php } ?>
	<br>
	<br>
	<br>
	<input type="email" name="email" placeholder="Email">
	<input type="text" name="username" placeholder="Username">
	<input type="password" name="password" placeholder="Password"> 
	<br>
	<button>SignUp</button>
</form>
</div>
<div class="form-container sign-in-container">
	<form action="signin.php" method="POST">
		<h1>Sign In</h1>
		<?php if (isset($_GET['blank'])){ ?>
			<p class="error"><?php echo $_GET['blank']; ?></p>
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
		<div class="overlay-panel overlay-left">
			<h1>COVID19 TID</h1>
			<h1>Application</h1>
			<br>
			<h4>Web application for traffic inflation data for COVID-19 dispersion control.</h4>
			<br>
			<p>To keep connected with us please login in our application!</p>
			<button class="ghost" id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>COVID19 TID</h1>
			<h1>Application</h1>
			<br>
			<h4>Web application for traffic inflation data for COVID-19 dispersion control.</h4>
			<br>
			<p>Do you want to visit any place with safety?</p>
			<button class="ghost" id="signUp">Sign Up</button>
		</div>
	</div>
</div>
</div>
<!-- Javascript Code -->
<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>
<br>

<p class="text_center">2022 All rights reserved, COVID19 TID Application <a href="index.php"></a></p>
 
</body>
</html>








