<?php
ob_start();
session_start();
include('koneksi.php');

// terima data dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);

// untuk mencegah sql injection
// kita gunakan mysql_real_escape_string
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

		$q = mysql_query("select * from tbadmin where username='$username' and password='$password'");
		$r = mysql_fetch_array ($q);
		$q2 = mysql_query("select * from tbmahasiswa where username='$username' and password='$password'");
		$row = mysql_fetch_array ($q2);
		if(mysql_num_rows($q)==1)
		{
			//jika yg login admin akan bernilai 1
			$_SESSION['username'] = $r['username'];			
			$_SESSION['nama_admin'] = $r['nama_admin'];			
			$_SESSION['id'] = $r['id_admin'];			
			$_SESSION['level'] = $r['level'];			
			header('Location: index.php');	
		}
			elseif (mysql_num_rows($q2) == 1) 
		{
			$_SESSION['username'] = $row['username'];			
			$_SESSION['nama_mahasiswa'] = $row['nama_mahasiswa'];			
			$_SESSION['id'] = $row['id_mahasiswa'];			
			$_SESSION['level'] = $row['level'];			
			header('location:index.php');
		}
		else
	{
		// Jika Gagal, Lakukan :
		echo '<script language="javascript" type="text/javascript">
        alert("Username atau Password yang anda masukkan salah!");</script>';
		echo "<script> document.location.href='index.php?page=login';</script>";
	}	

ob_end_flush();		
?>








