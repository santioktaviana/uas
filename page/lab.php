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
        <i class="fa fa-book"></i> Kelola Data Lab
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Lab</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box">
		  <br>
			<div class="col-xs-2">
				<a href="index.php?page=lab&view=add" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp; Tambah Lab</a>
			  </div>
			  <br>
			  <br>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
				  <th>Id Lab</th>
                  <th>Nama Lab</th>
                  <th>Edit</th>
				  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("select * from tblab ");
while ($data= mysql_fetch_array($sql))
{
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[id_lab]</td>
			<td>$data[nama_lab]</td>
			<td><a href=index.php?page=lab&view=edit&id=$data[id_lab] class='btn btn-info'><i class=\"fa fa-edit\"></i></a></td>
			<td><a href=index.php?page=lab&view=hapus&id=$data[id_lab] class='btn btn-info' onclick=\"return confirm('Hapus Data Ini ?')\"><i class=\"fa fa-trash\"></i></a></td>
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
        <i class="fa fa-fw fa-book"></i> Lab
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Lab</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Lab</h3>
            </div>
            <div class="box-body">
			<form action="" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
                <label>Nama Lab</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-book"></i>
						</div>
						<input type="text" class="form-control" placeholder="Masukkan Nama Lab" name="nama_lab">
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
        $nama_lab = $_POST['nama_lab'];
		
        $sql = mysql_query("INSERT INTO tblab VALUES('', '$nama_lab')"); // Eksekusi/ Jalankan query dari variabel $query
          if ($sql) {
            echo '<script language="javascript" type="text/javascript">
        alert("Data Berhasil Disimpan!");</script>';
            echo "<script> document.location.href='index.php?page=lab';</script>";
          } else {
            // Jika Gagal, Lakukan :
            echo '<script language="javascript" type="text/javascript">
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database !");</script>';
            echo "<script> document.location.href='index.php?page=lab&view=add';</script>";
          }
      }
	break;
	case "edit":
	$id=$_GET['id'];
	$sql=mysql_query("select * from tblab where id_lab='$id'");
	$data=mysql_fetch_array($sql);
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-user"></i> Lab
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Lab</li>
      </ol>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
      <!-- Default box -->
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Edit Lab</h3>
            </div>
            <div class="box-body">
			<form action="" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
                <label>Nama Lab</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-book"></i>
						</div>
						<input type="text" class="form-control" value="<?php echo $data['nama_lab'] ?>" name="nama_lab">
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
	$nama_lab = $_POST['nama_lab'];
	$sql = mysql_query("UPDATE tblab set nama_lab='$nama_lab' where id_lab='$id'");
	if($sql)
		{
			echo "<script language=javascript>
				alert('Edit Berhasil')
				document.location='index.php?page=lab&view=default';
				</script>";
		}
		else
		{
			echo "<script language=javascript>
				alert('Gagal, Silahkan ulangi inputan')
				document.location='index.php?page=lab&view=edit&id=$id';
				</script>";
		}
}

break;
case "hapus":
$id=$_GET['id'];
$sql=mysql_query("delete from tblab where id_lab='$id'");
if($sql)
	{
		echo "<script language=javascript>
					alert('Hapus Berhasil')
					document.location='index.php?page=lab&view=default';
					</script>";
	}
	else
	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi')
					document.location='index.php?page=lab&view=default';
					</script>";
	}


break;
}
?>  
