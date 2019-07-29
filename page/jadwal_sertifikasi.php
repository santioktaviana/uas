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
        <i class="fa fa-pencil"></i> Kelola Jadwal
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Kelola Data</a></li>
        <li class="active">Jadwal</li>
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
                </tr>
                </thead>
                <tbody>
<?php
$no=1;
$sql=mysql_query("select * from tbpeserta, tbmahasiswa, tbsertifikasi,tbjadwal where tbpeserta.id_mahasiswa=tbmahasiswa.id_mahasiswa and tbpeserta.id_sertifikasi=tbsertifikasi.id_sertifikasi and tbjadwal.id_mahasiswa=tbpeserta.id_mahasiswa and tbpeserta.status='Done'");
while ($data= mysql_fetch_array($sql))
{
	echo"
		<tr>
			<td align='center'>$no</td>
			<td>$data[nim_mahasiswa]</td>
			<td>$data[nama_mahasiswa]</td>
			<td>$data[tgl_sertifikasi]</td>
			<td>$data[jam]</td>
			<td>$data[lokasi]</td>
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
	case "tentukan":
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
                  <input type="text" class="form-control" value="<?php echo $data['id_mahasiswa'] ?>" name="id_mahasiswa" >
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
						<input type="text" class="form-control" value="<?php echo $data['id_sertifikasi'] ?>" name="id_sertifikasi" >
					</div>
			  </div>
			  <div class="row">
				<div class="col-md-4">
				  <div class="form-group">
					<label>Tanggal</label>

					<div class="input-group date">
					  <div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					  </div>
					  <input type="text" name="tgl_sertifikasi" class="form-control pull-right" id="datepicker">
					</div>
					
					<!-- /.input group -->
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Jam</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
					<input type="text" id="jam" name="jam" class="form-control timepicker">
                  </div>
                </div>
              </div>
			  </div>
			  <div class="col-md-4">
                <div class="form-group">
                  <label>Lokasi</label>
					<select class="form-control select" style="width: 100%;" name="lokasi">
                 <option selected="selected">- Pilih Lokasi -</option>
                 <?php
				  $sql = mysql_query("select * from tblab order by nama_lab asc");
				  while($data=mysql_fetch_array($sql))
				  {
					  echo"<option id=\"lokasi\" value=\"$data[nama_lab]\">".$data['nama_lab']." </option>";
				  }
				  ?>
               </select>
              </div>
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
        $id_mahasiswa = $_POST['id_mahasiswa'];
        $id_sertifikasi = $_POST['id_sertifikasi'];
        $tgl_sertifikasi = $_POST['tgl_sertifikasi'];
        $jam = $_POST['jam'];
        $lokasi = $_POST['lokasi'];
		
        $sql = mysql_query("INSERT INTO tbjadwal VALUES('', '$id_mahasiswa', '$id_sertifikasi' , '$tgl_sertifikasi', '$jam', '$lokasi')"); // Eksekusi/ Jalankan query dari variabel $query
          if ($sql) {
			  $sql2 = mysql_query("UPDATE tbpeserta set status='Done' where id_peserta='$id'");
			  if($sql2)
			  {
				 echo '<script language="javascript" type="text/javascript">
				alert("Data Berhasil Disimpan!");</script>';
				echo "<script> document.location.href='index.php?page=jadwal';</script>"; 
			  }
          } else {
            // Jika Gagal, Lakukan :
            echo '<script language="javascript" type="text/javascript">
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database !");</script>';
            echo "<script> document.location.href='index.php?page=jadwal&view=tentukan&id=$id';</script>";
          }
      }
	break;
}
?>

