<?php 
 include "dbinfo.php"; 
if(isset($_GET['id'])){
    $id= $_GET['id'];
        echo  $id;
    $conn=new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
	$sql = "DELETE FROM pois WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
   if ($result) {
   	  header("Location:adminDashboardDelete.php?success=Record POI successfully deleted");
   }else {
      header("Location:adminDashboardDelete.php?error=unknown error occurred");
   }

}else {
	header("Location:adminDashboardDelete.php");
}
?>










