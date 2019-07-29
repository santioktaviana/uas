<?php 
include "koneksi.php";
//kondisi parameter
$view = $_GET['view'];
switch ($view){
default:
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-pencil"></i> Kelola Data Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Mahasiswa</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box">
		  <br>
			<div class="col-xs-2">
				<a href="index.php?page=mahasiswa&view=add" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Mahasiswa</a>
			  </div>
			  <br>
			  <br>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
				  <th>Nim</th>
                  <th>Nama Mahasiswa</th>
                  <th>No Telp</th>
                  <th>Edit</th>
				  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("select * from tbmahasiswa ");
while ($data= mysql_fetch_array($sql))
{
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[nim_mahasiswa]</td>
			<td>$data[nama_mahasiswa]</td>
			<td>$data[no_telp_mahasiswa]</td>
			<td><a href=index.php?page=mahasiswa&view=edit&id=$data[id_mahasiswa] class='btn btn-info'><i class=\"fa fa-edit\"></i></a></td>
			<td><a href=index.php?page=mahasiswa&view=hapus&id=$data[id_mahasiswa] class='btn btn-info' onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
		</tr>		
		";
		$no++;
}
?>
                </tbody>
              </table>
			<script>
			$(document).ready(function() {
			$('#example').DataTable();
			} );
			</script>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 <?php
	break;
	case "add":
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-user"></i> Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Mahasiswa</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Mahasiswa</h3>
            </div>
            <div class="box-body">
			<form action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nim Mahasiswa</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-building"></i>
                  </div>
                  <input type="text" class="form-control" placeholder="Masukkan Nim Mahasiswa" name="nim_mahasiswa">
                </div>
              </div>
			  <div class="form-group">
                <label>Nama Mahasiswa</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-user"></i>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Nama Mahasiswa" name="nama_mahasiswa">
					</div>
			  </div>
			  <div class="form-group">
                <label>Username</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-user"></i>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Nama Mahasiswa" name="username">
					</div>
			  </div>
			  <div class="form-group">
                <label>Password</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-lock"></i>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Password" name="password">
					</div>
			  </div>
			  <div class="form-group">
                <label>No Telepon</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-phone"></i>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan No Telepon" name="no_telp_mahasiswa">
					</div>
			  </div>
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" id="simpan" name="simpan" value="Simpan"></input>
			  </div>
            </div>
          </div>
     </div>
   </section>
  <div class="control-sidebar-bg"></div>
</div>
  <?php
  if (isset($_POST['simpan'])) {
        $nim_mahasiswa = $_POST['nim_mahasiswa'];
        $nama_mahasiswa = $_POST['nama_mahasiswa'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $no_telp_mahasiswa = $_POST['no_telp_mahasiswa'];
        $level = 'mahasiswa';
		
        $sql = mysql_query("INSERT INTO tbmahasiswa VALUES('', '$nim_mahasiswa', '$nama_mahasiswa', '$username', '$password', '$no_telp_mahasiswa', '$level')"); // Eksekusi/ Jalankan query dari variabel $query
          if ($sql) {
            echo '<script language="javascript" type="text/javascript">
        alert("Data Berhasil Disimpan!");</script>';
            echo "<script> document.location.href='index.php?page=mahasiswa';</script>";
          } else {
            // Jika Gagal, Lakukan :
            echo '<script language="javascript" type="text/javascript">
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database !");</script>';
            echo "<script> document.location.href='index.php?page=mahasiswa&view=add';</script>";
          }
      }
	break;
	case "edit":
	$id=$_GET['id'];
	$sql=mysql_query("select * from tbmahasiswa where id_mahasiswa='$id'");
	$data=mysql_fetch_array($sql);
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-user"></i> Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Mahasiswa</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Mahasiswa</h3>
            </div>
            <div class="box-body">
			<form action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nim Mahasiswa</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-building"></i>
                  </div>
                  <input type="text" class="form-control" value="<?php echo $data['nim_mahasiswa'] ?>" name="nim_mahasiswa">
                </div>
              </div>
			  <div class="form-group">
                <label>Nama Mahasiswa</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-user"></i>
						</div>
						<input type="text" class="form-control" value="<?php echo $data['nama_mahasiswa'] ?>" name="nama_mahasiswa">
					</div>
			  </div>
			  <div class="form-group">
                <label>No Telepon</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-phone"></i>
						</div>
						<input type="text" class="form-control" value="<?php echo $data['no_telp_mahasiswa'] ?>" name="no_telp_mahasiswa">
					</div>
			  </div>
			  <div class="form-group">
                <label>Username</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-phone"></i>
						</div>
						<input type="text" class="form-control" value="<?php echo $data['username'] ?>" name="username">
					</div>
			  </div>
			  <div class="form-group">
                <label>Password</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-lock"></i>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Password" name="password">
					</div>
			  </div>			  
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" id="simpan" name="simpan" value="Simpan"></input>
			  </div>
            </div>
          </div>
     </div>
   </section>
  <div class="control-sidebar-bg"></div>
</div>
<?php
if(isset($_POST['simpan']))
{
	$nim_mahasiswa = $_POST['nim_mahasiswa'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $no_telp_mahasiswa = $_POST['no_telp_mahasiswa'];
	if($password==NULL)
	{
		$password=$passlama;
	}
	else
	{
	$sql = mysql_query("UPDATE tbmahasiswa set nim_mahasiswa='$nim_mahasiswa', nama_mahasiswa='$nama_mahasiswa', password='$password' , username='$username', no_telp_mahasiswa='$no_telp_mahasiswa' where id_mahasiswa='$id'");
	if($sql)
		{
			echo "<script language=javascript>
				alert('Edit Berhasil')
				document.location='index.php?page=mahasiswa&view=default';
				</script>";
		}
		else
		{
			echo "<script language=javascript>
				alert('Gagal, Silahkan ulangi inputan')
				document.location='index.php?page=mahasiswa&view=edit&id=$id';
				</script>";
		}
	}
}

break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from tbmahasiswa where id_mahasiswa='$id'");
if($sql)
	{
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=mahasiswa&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=mahasiswa&view=default';
					</script>";
	}


break;
}
?>  
