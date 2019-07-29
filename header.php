<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SERTIFIKASI FTI UNISBANK</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="DataTables/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="DataTables/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><img src="gambar/fti.png" width="55" height="50"></span>
      <span class="logo-lg"><img src="gambar/fti.png" width="50" height="35">SERTIFIKASI</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-fw fa-user"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <p>
				  <h1><font color="white" style="font-family:Times New Rowman">Welcome</font></h1>
                  <h3>
				  <font color="white" style="font-family:Times New Rowman">
				  <?php
				  if($_SESSION['level']=='admin')
				  {
					echo $_SESSION['nama_admin'];
				  } else if
				  ($_SESSION['level']=='mahasiswa')
				  {
					echo $_SESSION['nama_mahasiswa'];
				  }
				  
				  
//				  echo $_SESSION['nama_mahasiswa'];
				  ?>
				  </font>
				  </h3>
                </p>
              </li>
			  <?php 
				if ($_SESSION['level'] == 'admin') { 
				?>
              <li class="user-footer">
                <div class="pull-left">
                  <?php
				  echo" <a href='index.php?page=profile_admin&id=$_SESSION[id]' class=\"btn btn-default btn-flat\">Profile</a>"
				  ?>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
			  <?php } else if($_SESSION['level'] == 'mahasiswa') {?>
			  <li class="user-footer">
                <div class="pull-left">
                  <?php
				  echo" <a href='index.php?page=profile_mahasiswa&id=$_SESSION[id]' class=\"btn btn-default btn-flat\">Profile</a>"
				  ?>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
			  <?php }?>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
