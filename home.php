<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-home"></i> Home
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      </ol>
    </section>
  <section class="content">
        <div class="row">
		<center>
		<?php
		$sql = mysql_query("SELECT * FROM tbsertifikasi");
				$no = $mulai + 1;
				while ($data = mysql_fetch_array($sql)) {?>
        <div class="col-md-4">
        <div class="box box-default">
            <div class="box-header with-border">
            <h3 class="box-title"><?php echo $data['nama_sertifikasi']?></h3>
            </div>
            <div class="box-body">
              <img src="gambar/<?php echo $data['gambar'] ?>" width='100' height='130'">
            <!-- /.box-body -->
			</div><div class="box-body">
              <?php echo "
					<button type=button class='btn btn-primary' data-toggle='modal' 
					data-target='#myModal" . $data['id_sertifikasi'] . "'>Detail</button>"; ?>
            <!-- /.box-body -->
			</div>
			</div>
			
          <!-- /.box -->
        </div>
	
		<?php } ?>
			</center>
        <!-- /.col -->
      </div>
    </section>
  <div class="control-sidebar-bg"></div>
</div>
<?php
		$sql = mysql_query("select * from tbsertifikasi");
		while ($data = mysql_fetch_array($sql)) {
			?>
			<div class="modal fade" id="myModal<?php echo $data['id_sertifikasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Detail Sertifikasi</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body"> <center>
							<h4><?php echo $data['nama_sertifikasi'] ?></h4>
							<br>
							<img src="gambar/<?php echo $data['gambar'] ?>"  width="100px">
							<br>
							</center>
							<br>
							<?php echo $data['deskripsi'] ?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
		<?php } ?>