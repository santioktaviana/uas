<?php
 include "db.php";
 if(isset($_GET['nim']))
 {
 $nim=$_GET['nim'];
 $q=mysqli_query($con,"delete from `data_mhs` where `nim`='$nim'");
 if($q)
 echo "success";
 else
 echo "error";
 }
 ?>
