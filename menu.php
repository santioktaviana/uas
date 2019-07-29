<?php
include"koneksi.php";
$id=$_GET['id'];
$sql=mysql_query("select * from tbpeserta, tbmahasiswa, tbsertifikasi,tbjadwal where tbpeserta.id_mahasiswa=tbmahasiswa.id_mahasiswa and tbpeserta.id_sertifikasi=tbsertifikasi.id_sertifikasi and tbjadwal.id_mahasiswa=tbpeserta.id_mahasiswa  and tbmahasiswa.id_mahasiswa='$id'");
$data=mysql_fetch_array($sql);
?> 
 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li class="">
          <a href="index.php?page=home">
            <i class="fa fa-home"></i><span>Home</span>
          </a>
        </li>
<?php 
if ($_SESSION['level'] == 'admin') { 
?>
<li><a href="index.php?page=mahasiswa"><i class="fa fa-group"></i> Data Mahasiswa</a></li>
		<li><a href="index.php?page=sertifikasi"><i class="fa fa-book"></i> Sertifikasi</a></li>
		<li><a href="index.php?page=olahbayar"><i class="fa fa-exchange"></i> Olah Pembayaran</a></li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-plus-o"></i>
            <span>Kelola Jadwal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="index.php?page=tanggal"><i class="fa fa-angle-right"></i>Atur Tanggal & Waktu</a></li>
            <li><a href="index.php?page=jadwal"><i class="fa fa-angle-right"></i> Atur Jadwal</a></li>
			<li><a href="index.php?page=jadwal_sertifikasi"><i class="fa fa-angle-right"></i> Jadwal Sertifikasi</a></li>
          </ul>
        </li>
		<li><a href="index.php?page=lab"><i class="fa fa-university"></i>Lab</a></li>
		<li><a href="https://uassertifikasi.000webhostapp.com/FTI/FTI/tampil_json/json/www/json.php"><i class="fa fa-exchange"></i>Lihat JSON</a></li>
		<li><a href="https://dashboard.tawk.to/#/chat"><i class="fa fa-comments"></i>Chat</a></li>
		<?php } else{?>
				<li><?php echo '<a href="index.php?page=data_peserta&id='.$_SESSION[id].'">'?><i class="fa fa-odnoklassniki"></i> Data Peserta</a></li>
		<li><?php echo '<a href="index.php?page=jadwal_saya&id='.$_SESSION[id].'">'?><i class="fa fa-calendar-plus-o"></i> Jadwal Sertifikasi</a></li>
			
			
    </section>
	<?php }?>
    <!-- /.sidebar -->
  </aside>
