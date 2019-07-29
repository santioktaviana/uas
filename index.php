<?php session_start();
error_reporting(0);
if(empty($_SESSION['username']))
{
	header("location:login.php");
}
else
{	
include"koneksi.php";
include"header.php";
include"menu.php";
$get_page=$_GET['page'];
if(empty($get_page))
{
	$get_page="home";
}
switch($get_page)
{
	case"home";
	include"home.php";
	break;
	
	case"mahasiswa";
	include"page/mahasiswa.php";
	break;
	
	case"profile_mahasiswa";
	include"page/profile_mahasiswa.php";
	break;
	
	case"data_peserta";
	include"page/data_peserta.php";
	break;
	
	case"sertifikasi";
	include"page/sertifikasi.php";
	break;
	
	case"olahbayar";
	include"page/olahbayar.php";
	break;
	
	case"jadwal";
	include"page/jadwal.php";
	break;
	
	case"jadwal_sertifikasi";
	include"page/jadwal_sertifikasi.php";
	break;
	
	case"jadwal_saya";
	include"page/jadwal_saya.php";
	break;

	case"lab";
	include"page/lab.php";
	break;
	case"Laporan_pendaftar";
	include"page/lab.php";
	break;
	
	case"profile_admin";
	include"page/profile_admin.php";
	break;
	
	case"profile_mahasiswa";
	include"page/profile_mahasiswa.php";
	break;
		
}
}
include"footer.php";
?>
