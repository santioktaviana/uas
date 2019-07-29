<div class="content-wrapper">
<section class="content-header">
      <h1>
        <i class="fa fa-pencil"></i> Proses
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="#"><i class="fa fa-home"></i> Kelola Transaksi</a></li>
        <li class="active">Proses</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
          <div class="box">
            <form method="POST" action="">
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20%">ID Peserta</th>
				  <th style="width: 10px">:</th>
				  <th><?php echo $data['id_peserta']?></th>
                </tr>
				<tr>
                  <th style="width: 20%">NIM Mahasiswa</th>
				  <th style="width: 10px">:</th>
				  <th><?php echo $data['nim_mahasiswa']?></th>
                </tr>
				<tr>
                  <th style="width: 20%">Nama Mahasiswa</th>
				  <th style="width: 10px">:</th>
				  <th><?php echo $data['nama_mahasiswa']?></th>
                </tr>
				<tr>
                  <th style="width: 20%">Sertifikasi</th>
				  <th style="width: 10px">:</th>
				  <th><?php echo $data['nama_sertifikasi']?></th>
                </tr>
				<tr>
                  <th style="width: 20%">Tanggal Sertifikasi</th>
				  <th style="width: 10px">:</th>
				  <th><?php echo $data['tgl_sertifikasi']?></th>
                </tr>
				<tr>
                  <th style="width: 20%">Jam</th>
				  <th style="width: 10px">:</th>
				  <th><?php echo $data['jam']?> WIB</th>
                </tr>
				<tr>
                  <th style="width: 20%">Lokasi</th>
				  <th style="width: 10px">:</th>
				  <th><?php echo $data['lokasi']?></th>
                </tr>
              </table>
			  <br>
            </div>
			</form>
      </div>
      </div>
    </section>
  </div>  