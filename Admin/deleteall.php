<?php 
 include "dbinfo.php"; 
    $conn=new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
	$sql = "DELETE FROM pois";
    $result = mysqli_query($conn,$sql);
   if ($result) {
   	  header("Location:adminDashboardDelete.php?success=All POIs successfully deleted");
   }else {
      header("Location:adminDashboardDelete.php?error=unknown error occurred");
   }

}else {
	header("Location:adminDashboardDelete.php");
}
?>










