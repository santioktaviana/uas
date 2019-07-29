<?php
include"koneksi.php";
$id=$_GET['id'];
$sql=mysql_query("select * from tbmahasiswa where id_mahasiswa='$id'");
$data=mysql_fetch_array($sql);
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-pencil"></i> Profile
      </h1>
    </section>
  <!-- /.control-sidebar -->
  <section class="content">
	<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Edit Profile</h3>
            </div>
            <div class="box-body">
			<form  action="" method="POST" enctype="multipart/form-data">
			   <div class="form-group">
                <label>NIM</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-user"></i>
                  </div>
                  <input type="text" name="nim_mahasiswa" id="nim_mahasiswa" class="form-control" value="<?php echo $data['nim_mahasiswa'];?>" disabled>
                  <input type="hidden" name="tgl_bayar" id="tgl_bayar" class="form-control" value="<?php echo date('Y-m-d') ?>" disabled>
                  <input type="hidden" name="id_mahasiswa" id="id_mahasiswa" class="form-control" value="<?php echo $data['id_mahasiswa'];?>" >
                </div>
              </div>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-envelope"></i>
                  </div>
                  <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" value="<?php echo $data['nama_mahasiswa'];?>" disabled>
                </div>
              </div>
			   <div class="form-group">
                <label>No Telepon</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-phone"></i>
                  </div>
                  <input type="text" name="no_telp_mahasiswa" id="no_telp_mahasiswa" class="form-control" value="<?php echo $data['no_telp_mahasiswa'];?>" disabled>
                </div>
              </div>
              <div class="form-group">
               <label>Sertifikasi</label>
               <select class="form-control select" style="width: 100%;" name="id_sertifikasi">
                 <option selected="selected">- Pilih Sertifikasi -</option>
                 <?php
				  $sql = mysql_query("select * from tbsertifikasi order by nama_sertifikasi asc");
				  while($data=mysql_fetch_array($sql))
				  {
					  echo"<option id=\"id_sertifikasi\" value=\"$data[id_sertifikasi]\">".$data['nama_sertifikasi']." </option>";
				  }
				  ?>
               </select>
              </div>
			  <div class="form-group">
                <label for="exampleInputFile">Upload Bukti Bayar</label>
                <input type="file" id="bukti_bayar" name="bukti_bayar">
              </div>
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" value="Simpan" name="simpan" id="simpan"></input>
			  </div>
			  </form>
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
$tgl_bayar = date('Y-m-d');
$bukti_bayar = $_FILES['bukti_bayar']['name'];
$tmp = $_FILES['bukti_bayar']['tmp_name'];
$fotobaru = $bukti_bayar;
$path = "struk/".$fotobaru;
$status = 'Proses';
if(move_uploaded_file($tmp,$path))
{ 
	$sql = mysql_query("INSERT INTO tbpeserta VALUES('','$id_mahasiswa', '$id_sertifikasi', '$tgl_bayar', '$bukti_bayar', '$status')"); // Eksekusi/ Jalankan query dari variabel $query
	if($sql)
	{
		echo '<script language="javascript" type="text/javascript">
        alert("Data Tersimpan !");</script>';
		echo "<script> document.location.href='index.php?page=data_peserta&id=$_SESSION[id]';</script>";
	}
	else
	{
		// Jika Gagal, Lakukan :
		echo '<script language="javascript" type="text/javascript">
        alert("Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database !");</script>';
		echo "<script> document.location.href='index.php?page=data_peserta';</script>";
	}
}
	else
{
	// Jika gambar gagal diupload, Lakukan :
	echo '<script language="javascript" type="text/javascript">
        alert("Gambar gagal untuk diupload !");</script>';
	echo "<script> document.location.href='index.php?page=input_gambar';</script>";
}
}
?>