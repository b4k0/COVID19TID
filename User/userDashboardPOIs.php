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
      <a href="userDashboardPOIs.php"  class="active">
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
      <a href="userDashboardPersonalData.php">
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

    <div id="map"></div>
    
</body>
</html>

<!-- Leaflet.js -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
<script>
    var map = L.map('map').setView([38.246639, 21.734573], 15.5);

    // var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    // });
    // osm.addTo(map);
  

   var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});
googleStreets.addTo(map);

// L.marker([38.246639, 21.734573]).addTo(map);
var lc = L.control.locate({
       locateOptions: {
               enableHighAccuracy: true
}}).addTo(map);
lc.start();
</script>