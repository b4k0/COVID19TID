<?php
session_start();
?>

<!-- HTML Code -->
<!DOCTYPE html>
<html>
<head>
	<title>COVID19 TID Admin</title>
    <link rel="stylesheet" type="text/css" href="styledashboard.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h2> Welcome <?php echo $_SESSION["username"]?></h2>
    <a href="logout.php">Log out</a>
</body>
</html>