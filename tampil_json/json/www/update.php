<?php
 include "db.php";
 if(isset($_POST['update']))
 {
 $nim=$_POST['nim'];
 $nama=$_POST['nama'];
$progdi=$_POST['progdi'];
 $sertif=$_POST['sertif'];
 $email=$_POST['email'];
  $nohp=$_POST['nohp'];
 $q=mysqli_query($con,"UPDATE `data_mhs` SET `nim`='$nim',`nama`='$nama',`progdi`='$progdi',`sertif`='$sertif',`email`='$email',`nohp`='$nohp' where `nim`='$nim'");
 if($q)
 echo "success";
 else
 echo "error";
 }
 ?>
