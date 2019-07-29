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
        <i class="fa fa-pencil"></i> Kelola Data Pembayaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Pembayaran</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box">
		  <br>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
				  <th>Nim</th>
                  <th>Nama Mahasiswa</th>
                  <th>Sertifikasi</th>
                  <th>Bukti Bayar</th>
                  <th>Status</th>
                  <th>Proses</th>
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("select * from tbpeserta, tbmahasiswa, tbsertifikasi where tbpeserta.id_mahasiswa=tbmahasiswa.id_mahasiswa and tbpeserta.id_sertifikasi=tbsertifikasi.id_sertifikasi and tbpeserta.status='Proses'");
while ($data= mysql_fetch_array($sql))
{
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[nim_mahasiswa]</td>
			<td>$data[nama_mahasiswa]</td>
			<td>$data[nama_sertifikasi]</td>
			<td><img src='struk/$data[bukti_bayar]' width='100' height='130'/></td>
			<td>$data[status]</td>
			<td><a href=index.php?page=olahbayar&view=proses&id=$data[id_peserta] class='btn btn-info'><i class=\"fa fa-mail-forward\"></i></a></td>
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
	include "koneksi.php";
	case "proses":
	$id=$_GET['id'];
	$sql=mysql_query("select * from tbpeserta, tbmahasiswa, tbsertifikasi where tbpeserta.id_mahasiswa=tbmahasiswa.id_mahasiswa and tbpeserta.id_sertifikasi=tbsertifikasi.id_sertifikasi and  id_peserta='$id'");
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
                  <input type="text" class="form-control" value="<?php echo $data['nim_mahasiswa'] ?>" name="nim_mahasiswa" disabled>
                </div>
              </div>
			  <div class="form-group">
                <label>Nama Mahasiswa</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-user"></i>
						</div>
						<input type="text" class="form-control" value="<?php echo $data['nama_mahasiswa'] ?>" name="nama_mahasiswa" disabled>
					</div>
			  </div>
			  <div class="form-group">
                <label>Sertifikasi</label>
					<div class="input-group">
						<div class="input-group-addon">
						<i class="fa fa-fw fa-user"></i>
						</div>
						<input type="text" class="form-control" value="<?php echo $data['nama_sertifikasi'] ?>" name="nama_sertifikasi" disabled>
					</div>
			  </div>
			  <div class="form-group">
				<a class="example-image-link" href="struk/"<?php echo $data['bukti_bayar'] ?> target="_blank"></a>
				<img src="struk/<?php echo $data['bukti_bayar']?>" width="10%"><br>
              </div>
			  <div class="form-group">
               <label>Status</label>
               <select class="form-control select" style="width: 100%;" name="status" id="status">
                 <option selected="selected"><?php echo $data['status'] ?></option>
                 <option value="Selesai">Selesai</option>
               </select>
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
	$status=$_POST['status'];
	
	$sql = mysql_query("UPDATE tbpeserta set status='$status' where id_peserta='$id'");
	if($sql)
	{
		{
				echo "<script language=javascript>
					alert('Proses Berhasil')
					document.location='index.php?page=olahbayar&view=default';
					</script>";
		}
	}
	
	else

	{
		echo "<script language=javascript>
					alert('Gagal, Silahkan ulangi lagi')
					document.location='index.php?page=olahbayar&view=proses';
					</script>";
	}
}
	break;
}
?>

