<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d2db5b79b94cd38bbe79c41/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php
include"koneksi.php";
$id=$_GET['id'];
$sql=mysql_query("select * from tbmahasiswa where id_mahasiswa='$id'");
$data=mysql_fetch_array($sql);
$passlama=$data['password'];
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
                  <input type="text" name="nim_mahasiswa" id="nim_mahasiswa" class="form-control" value="<?php echo $data['nim_mahasiswa'];?>">
                </div>
              </div>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-envelope"></i>
                  </div>
                  <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" value="<?php echo $data['nama_mahasiswa'];?>">
                </div>
              </div>
			   <div class="form-group">
                <label>No Telepon</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-phone"></i>
                  </div>
                  <input type="text" name="no_telp_mahasiswa" id="no_telp_mahasiswa" class="form-control" value="<?php echo $data['no_telp_mahasiswa'];?>">
                </div>
              </div>
              <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-user"></i>
                  </div>
                  <input type="text" name="username" id="username" class="form-control" value="<?php echo $data['username'];?>">
                </div>
              </div>
			  <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-lock"></i>
                  </div>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
              </div>
			  <div class="form-group">
                <label>Ketik Ulang Password</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-fw fa-lock"></i>
                  </div>
                  <input type="password" name="repass" id="repass" class="form-control">
                </div>
              </div>
			  <div class="col-xs-2">
				<input type="submit" class="btn btn-primary" value="Simpan" name="save" id="save"></input>
			  </div>
			  </form>
            </div>
          </div>
     </div>
   </section>
  <div class="control-sidebar-bg"></div>
</div>
<?php
if(isset($_POST['save']))
{
	$nim_mahasiswa=$_POST['nim_mahasiswa'];
	$nama_mahasiswa=$_POST['nama_mahasiswa'];
	$username=$_POST['username'];
	$password = $_POST['password'];
	$no_telp_mahasiswa=$_POST['no_telp_mahasiswa'];
	$repass=$_POST['repass'];
	if($password==NULL)
	{
		$password=$passlama;
	}
	else
	{
		if($password==$repass)
		{
			$password=md5($password);
		}
		else
		{
			echo "<script language=javascript>
						alert('Password yang anda masukkan salah')
						document.location='index.php?page=profile_mahasiswa&id=$_SESSION[id]';
						</script>";
		}
		
	}
	$sql = mysql_query("UPDATE tbmahasiswa set nim_mahasiswa='$nim_mahasiswa', nama_mahasiswa='$nama_mahasiswa', username='$username', password='$password', no_telp_mahasiswa='$no_telp_mahasiswa' where id_mahasiswa='$id'");
			if($sql)
			{
				echo "<script language=javascript>
				alert('Edit profile Berhasil')
				document.location='index.php?page=profile_mahasiswa&id=$_SESSION[id]';
				</script>";
			}
			else
			{
				echo "<script language=javascript>
				alert('Gagal, Silahkan ulangi inputan')
				document.location='index.php?page=profile_mahasiswa&id=$_SESSION[id]';
				</script>";
			}
}
?>