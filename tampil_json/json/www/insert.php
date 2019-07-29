<?php
 include "db.php";
 if(isset($_POST['insert']))
 {
 
$nim=$_POST['nim'];
 $nama=$_POST['nama'];
 $progdi=$_POST['progdi'];
  $sertif=$_POST['sertif'];
 $email=$_POST['email'];
   $nohp=$_POST['nohp'];
   
 $q=mysqli_query($con,"INSERT INTO `data_mhs` (`nim`,`nama`,`progdi`,`sertif`,`email`,`nohp`) VALUES ('$nim','$nama','$progdi','$sertif','$email','$nohp')");
 if($q)
  echo "success";
 else
  echo "error";
 }
 ?>
