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
        <i class="fa fa-book"></i> Kelola Data Sertifikasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Sertifikasi</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box">
		  <br>
			<div class="col-xs-2">
				<a href="index.php?page=sertifikasi&view=add" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Sertifikasi</a>
			  </div>
			  <br>
			  <br>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
				  <th>Id Sertifikasi</th>
                  <th>Nama Sertifikasi</th>
                  <th>Gambar</th>
                  <th>Edit</th>
				  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("select * from tbsertifikasi ");
while ($data= mysql_fetch_array($sql))
{
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[id_sertifikasi]</td>
			<td>$data[nama_sertifikasi]</td>
			<td><img src='gambar/$data[gambar]' width='100' height='130'/></td>
			<td><a href=index.php?page=sertifikasi&view=edit&id=$data[id_sertifikasi] class='btn btn-info'><i class=\"fa fa-edit\"></i></a></td>
			<td><a href=index.php?page=sertifikasi&view=hapus&id=$data[id_sertifikasi] class='btn btn-info' onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
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
        <i class="fa fa-fw fa-book"></i> Sertifikasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Sertifikasi</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Sertifikasi</h3>
            </div>
            <div class="box-body">
			<form action="" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
                <label>Nama Sertifikasi</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-book"></i>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Nama Sertifikasi" name="nama_sertifikasi">
					</div>
			  </div>
			  <div class="form-group">
                <label for="exampleInputFile">Gambar</label>
                <input type="file" id="gambar" name="gambar">
              </div>
			  <div class="form-group">
                <label for="exampleInputFile">Deskripsi</label>
                <textarea name="deskripsi" class="ckeditor" id="ckeditor"></textarea>
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
        $nama_sertifikasi = $_POST['nama_sertifikasi'];
        $deskripsi = $_POST['deskripsi'];
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $fotobaru = $gambar;
        $path = "gambar/" . $fotobaru;
        if (move_uploaded_file($tmp, $path)) {
          $sql = mysql_query("INSERT INTO tbsertifikasi VALUES('', '$nama_sertifikasi', '$gambar', '$deskripsi')"); // Eksekusi/ Jalankan query dari variabel $query
          if ($sql) {
            echo '<script language="javascript" type="text/javascript">
        alert("Data Berhasil Disimpan!");</script>';
            echo "<script> document.location.href='index.php?page=sertifikasi';</script>";
          } else {
            // Jika Gagal, Lakukan :
            echo '<script language="javascript" type="text/javascript">
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database !");</script>';
            echo "<script> document.location.href='index.php?page=sertifikasi';</script>";
          }
        }
      }
	break;
	case "edit":
	$id=$_GET['id'];
	$sql=mysql_query("select * from tbsertifikasi where id_sertifikasi='$id'");
	$data=mysql_fetch_array($sql);
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-user"></i> Sertifikasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Sertifikasi</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Edit Sertifikasi</h3>
            </div>
            <div class="box-body">
			<form action="" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
                <label>Nama Sertifikasi</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-book"></i>
						</div>
						<input type="text" class="form-control" value="<?php echo $data['nama_sertifikasi'] ?>" name="nama_sertifikasi">
					</div>
					<br>
					 <div class="form-group">
				<a class="example-image-link" href="images/"<?php echo $data['gambar'] ?> target="_blank"></a>
				<img src="gambar/<?php echo $data['gambar']?>" width="10%"><br>
                <input type="checkbox" name="cek_gambar"><label>&nbsp; &nbsp; Ceklist jika ingin mengubah gambar</label>
                <input type="file" id="gambar" name="gambar">
              </div>
			  <div class="form-group">
                <label for="exampleInputFile">Deskripsi</label>
                <textarea name="deskripsi" class="ckeditor" id="ckeditor"><?php echo $data['deskripsi']?></textarea>
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
          $nama_sertifikasi = $_POST['nama_sertifikasi'];
          $deskripsi = $_POST['deskripsi'];
          $gambar = $_FILES['gambar']['name'];
          $tmp = $_FILES['gambar']['tmp_name'];
          $fotobaru = $gambar;
          $path = "gambar/" . $fotobaru;

          if (isset($_POST['cek_gambar'])) {
            $gambar = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];
            $fotobaru = $gambar;
            $path = "gambar/" . $fotobaru;
            if (move_uploaded_file($tmp, $path))
              $sql = mysql_query("UPDATE tbsertifikasi set nama_sertifikasi='$nama_sertifikasi',  gambar='$gambar', deskripsi='$deskripsi' where id_sertifikasi='$id'");
            if ($sql) {
              echo "<script language=javascript>
							alert('Edit Berhasil')
							document.location='index.php?page=sertifikasi&view=default';
							</script>";
            } else {
              echo "<script language=javascript>
							alert('Gagal, Silahkan ulangi inputan')
							document.location='index.php?page=sertifikasi&view=edit&id=$id';
							</script>";
            }
          } else {
            $sql = mysql_query("UPDATE tbsertifikasi set nama_sertifikasi='$nama_sertifikasi', deskripsi='$deskripsi' where id_sertifikasi='$id'");
            if ($sql) { {
                echo "<script language=javascript>
							alert('Edit Berhasil')
							document.location='index.php?page=sertifikasi&view=default';
							</script>";
              }
            } else {
              echo "<script language=javascript>
							alert('Gagal, Silahkan ulangi inputan')
							document.location='index.php?page=sertifikasi&view=edit&id=$id';
							</script>";
            }
          }
        }
break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from tbsertifikasi where id_sertifikasi='$id'");
if($sql)
	{
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=sertifikasi&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=sertifikasi&view=default';
					</script>";
	}


break;
}
?>  
