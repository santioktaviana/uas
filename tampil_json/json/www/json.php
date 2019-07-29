<?php
include "db.php";
$data=array();
$q=mysqli_query($con,"select * from `tbadmin`");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>

<?php
$data=array();
$a=mysqli_query($con,"select * from `tbjadwal`");
while ($row=mysqli_fetch_object($a)){
 $data[]=$row;
}
echo json_encode($data);
?>

<?php
$data=array();
$b=mysqli_query($con,"select * from `tblab`");
while ($row=mysqli_fetch_object($b)){
 $data[]=$row;
}
echo json_encode($data);
?>

<?php
$data=array();
$c=mysqli_query($con,"select * from `tbmahasiswa`");
while ($row=mysqli_fetch_object($c)){
 $data[]=$row;
}
echo json_encode($data);
?>

<?php
$data=array();
$d=mysqli_query($con,"select * from `tbpeserta`");
while ($row=mysqli_fetch_object($d)){
 $data[]=$row;
}
echo json_encode($data);
?>

<?php
$data=array();
$e=mysqli_query($con,"select * from `tbsertifikasi`");
while ($row=mysqli_fetch_object($e)){
 $data[]=$row;
}
echo json_encode($data);
?>