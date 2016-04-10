<!DOCTYPE html>
<html>
<head>
	<title>Surat</title>
	<link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/bootstrap/css/dashboard.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/bootstrap/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
	<div class="navbar-header">
	  	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="nasvbar">
	    	<span class="sr-only">Toggle navigation</span>
	    	<span class="icon-bar"></span>
	    	<span class="icon-bar"></span>
	    	<span class="icon-bar"></span>
	  	</button>
	  	<a class="navbar-brand" href="#">Surat Karyawan Kontrak</a>
	</div> 
	<div id="navbar" class="navbar-collapse collapse">
	<ul class="nav navbar-nav navbar-right">
	<li>
	<a href="<?php echo base_url(); ?>index.php/Welcome/logout">Logout</a>
	</li>
	</ul>
	</div>
	</div>
    </nav>

	<div class="col-sm-3 col-md-2 sidebar">
	    <ul class="nav nav-sidebar">
	        <li><a href="<?php echo base_url('index.php/Welcome/home') ?>">Beranda<span class="sr-only">(current)</span></a></li>
	        <li><a href="<?php echo base_url('index.php/Welcome/Karyawan') ?>">Data Karyawan</a></li>
	        <li><a href="<?php echo base_url('index.php/Welcome/inventaris') ?>">Laporan</a></li>
	        <li><a href="<?php echo base_url('index.php/Welcome/kock') ?>">Form Kontrak</a></li>
	        <li><a href="<?php echo base_url('index.php/Welcome/kock') ?>">Data User</a></li>
	    </ul>
    </div>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    	<?php $this->load->view($content) ?>
    </div>

</body>
</html>
