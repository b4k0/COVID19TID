<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);;
?>

<!-- HTML Code --> 
<!DOCTYPE html>
<html>
<head>
	<title>COVID19 TID Admin</title>
    <link rel="stylesheet" type="text/css" href="styleAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

   
    <div class="sidebar">
      <p>COVID 19 TID</p>
      <header>
        <i class="fas fa-user-shield"></i>
        <?php echo $_SESSION["username"]?>
      </header>
      <br>
      <a href="adminDashboard.php" class="active">
        <i class="fas fa-chart-pie"></i>
        <span>Statistics</span>
      </a>
      <a href="adminDashboardUpload.php">
        <i class="fas fa-upload"></i>
        <span>Upload Data</span>
        </a>
        <a href="adminDashboardDelete.php">
        <i class="fas fa-trash-alt"></i>
        <span>Delete Data</span>
        </a>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
     
      <a href="logoutAdmin.php">
        <i class="fas fa-redo-alt"></i>
        <span>Logout</span>
      </a>
    </div>

    <div id="card">
        <div class="row">
          <div class="col-sm-3" >
            <div class="card text-light bg-success mb-3" style="width: 15rem; height: 12rem;">
            <div class="card-header">Total Users</div>
              <div class="card-body">
                <h5 class="card-title  text-center">Users</h5>
                <?php
                   require 'dbinfo.php';

                  
                    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
                   $sql = "SELECT COUNT(*) AS total FROM users";
                   $result = mysqli_query($conn,$sql);
                   $data = mysqli_fetch_assoc($result);
                   $real = $data['total'] - 1;
        
                   echo '<h1 class="card-text text-center">  '.$real.'</h1>';

                ?>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card text-light bg-warning mb-3" style="width: 15rem; height: 12rem;">
            <div class="card-header">Total POIs</div>
              <div class="card-body">
                <h5 class="card-title text-center">POIs</h5>
                <?php
                   require 'dbinfo.php';

                  
                    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
                    $sql = "SELECT COUNT(*) AS total FROM pois";
                    $result = mysqli_query($conn,$sql);
                    $data = mysqli_fetch_assoc($result);
         
                    echo '<h1 class="card-text text-center">  '.$data['total'].'</h1>';
 
                ?>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card text-light bg-secondary mb-3" style="width: 15rem; height: 12rem;">
            <div class="card-header">Total Visits</div>
              <div class="card-body">
                <h5 class="card-title text-center">Visits</h5>
                <?php
                   require 'dbinfo.php';

                  
                    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
                    $sql = "SELECT COUNT(*) AS total FROM visit";
                    $result = mysqli_query($conn,$sql);
                    $data = mysqli_fetch_assoc($result);
         
                    echo '<h1 class="card-text text-center">  '.$data['total'].'</h1>';
 
                ?>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card text-light bg-danger mb-3" style="width: 15rem; height: 12rem;">
            <div class="card-header">Total Covid Inflections</div>
              <div class="card-body">
                <h5 class="card-title text-center">Covid Inflections</h5>
                <?php
                   require 'dbinfo.php';

                  
                    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
                    $sql = "SELECT DISTINCT COUNT(*) AS total FROM covid";
                    $result = mysqli_query($conn,$sql);
                    $data = mysqli_fetch_assoc($result);
         
                    echo '<h1 class="card-text text-center">  '.$data['total'].'</h1>';
                  ?>
              </div>
            </div>
          </div>
    </div>
      <br>
      <br>

<?php
 require 'dbinfo.php';

                  
  $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
  $sql =  $conn->query("SELECT pois.types as types, COUNT(visit.poi) as visits
  FROM pois
  INNER JOIN visit ON pois.id = visit.poi
  GROUP BY pois.types
  ");

  foreach($sql as $data){
    $visit[] = $data['visits'];
    $types[] = $data['types'];
  }
    
    ?>
    <!-- <div class='row'> -->
    <div style="width:60%; margin-left:150px; text-align:center">
    <h4>Visits per Category Pie</h4>
      <canvas id="myChart"></canvas>
      <br>
    
    </div>

    <script>

const data = {
  labels:<?php echo json_encode($types)?>,
  datasets: [{
    label: 'Visits per Category',
    data: <?php echo json_encode($visit)?>,
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 205, 86)',
      'rgb(54, 162, 235)',
      'rgb(75, 192, 192)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)',
      'rgb(255, 159, 64)',
      'rgb(179, 11, 0)'
    ],
    hoverOffset: 4
  }]
};

const config = {
  type: 'doughnut',
  data: data,
};
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
<?php
 require 'dbinfo.php';

                  
  $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
  $sql2 =  $conn->query("SELECT pois.name as poi, pois.current_popularity as popularity
  FROM pois
  WHERE pois.current_popularity > 66
  GROUP BY pois.current_popularity DESC
  ");

  foreach($sql2 as $data){
    $poi[] = $data['poi'];
    $popularity[] = $data['popularity'];
  }
    
    ?>
    <br>
    <div style="width:50%; margin-left:200px; text-align:center">
    <h4>POIs with high popularity Pie</h4>
      <canvas id="myChart2"></canvas>
      <br>
    </div>

    <script>

const data2 = {
  labels:<?php echo json_encode($poi)?>,
  datasets: [{
    label: '',
    data: <?php echo json_encode($popularity)?>,
    backgroundColor: [
      'rgb(54, 162, 235)',
      'rgb(179, 11, 0)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)',
      'rgb(255, 159, 64)'
    ],
    hoverOffset: 4
  }]
};

const config2 = {
  type: 'pie',
  data: data2,
};
</script>

<script>
  const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2
  );
</script>

</div>
</div>


    
</body>
</html>
