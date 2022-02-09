<?php
session_start();
?>

<!-- HTML Code --> 
<!DOCTYPE html>
<html>
<head>
	<title>COVID19 TID User</title>
    <link rel="stylesheet" type="text/css" href="styledashboard.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'>
    <!-- Leaflet css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />

</head>
<body>
<div class="dash">
 

</div>

</div>
    <div class="sidebar">
      <p>COVID 19 TID</p>
      <header>
        <i class="fas fa-user-alt"></i>
        <?php echo $_SESSION["username"]?>
      </header>
      <br>
      <a href="userDashboard.php">
        <i class="fas fa-map"></i>
        <span>Live Map</span>
      </a>
      <a href="userDashboardPOIs.php">
        <i class="fas fa-search"></i>
        <span>Search POIs</span>
      </a>
      <a href="userDashboardVisit.php">
        <i class="fas fa-flag"></i>
        <span>Insert Visit</span>
      </a>
      <a href="userDashboardCovid.php">
         <i class="fas fa-virus"></i>
        <span>Covid Inflection</span>
      </a>
      <a href="userDashboardPositiveCase.php">
        <i class="fas fa-allergies"></i>
        <span>Contact positive Case</span>
      </a>
      <a href="userDashboardPersonalData.php"  class="active">
        <i class="fas fa-address-book"></i>
        <span>Personal Data</span>
      </a>
      <br>
      <br>
      <br>
      <br>
     
      <a href="logout.php">
        <i class="fas fa-redo-alt"></i>
        <span>Logout</span>
      </a>
    </div>
 
    
</body>
</html>
