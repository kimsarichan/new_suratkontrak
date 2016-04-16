
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
	<style type="text/css">
	@font-face {
	  font-family: 'Cabin';
	  font-style: normal;
	  font-weight: 400;
	  src: local('Cabin Regular'), local('Cabin-Regular'), url(<?php echo base_url(); ?>aset/font/satu.woff) format('woff');
	}
	@font-face {
	  font-family: 'Cabin';
	  font-style: normal;
	  font-weight: 700;
	  src: local('Cabin Bold'), local('Cabin-Bold'), url(<?php echo base_url(); ?>aset/font/dua.woff) format('woff');
	}
	@font-face {
	  font-family: 'Lobster';
	  font-style: normal;
	  font-weight: 400;
	  src: local('Lobster'), url(<?php echo base_url(); ?>aset/font/tiga.woff) format('woff');
	}	
	
	</style>
	<link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/bootstrap/css/font-awesome.min.css" rel="stylesheet">
  <body style="">
	<div class="container-fluid" style="margin-top: 30px">
	
      <div class="row-fluid">
		<div style="width: 400px; margin: 0 auto">
			<div class="well well-sm">
				<img src="">
				<h3 style="margin: 5px 0 0.4em 0; font-size: 21px; color: #000; font-weight: bold">PT LEN</h3>
				<div style="color: #000; font-size: 13px" class="clearfix">Jln Soerkarno Hatta</div>
			 </div>
		</div>
		
		<div class="well" style="width: 400px; margin: 20px auto; border: solid 1px #d9d9d9; padding: 30px 20px; border-radius: 8px">
		<form action=<?php echo base_url()."index.php/Welcome/login"; ?> method="post">
		<legend>Login Admin</legend>	
		<table align="center"style="padding-bottom: 100%;" class="table-form" width="90%">
			<tr ><td width="40%">Username</td><td><input type="text" autofocus name="username" required style="width: 200px" autofocus class="form-control"></td></tr>
			<tr><br><td>Password</td><td><input type="password" name="password" required style="width: 200px" class="form-control"></td></tr>
			</td></tr>
			<tr><td></td><td><input type="submit" class="btn btn-success" style="width: 200px" ></td></tr>
		</table>
		</form>
		</div><!--/span-->
      </div><!--/row-->

    </div><!--/.fluid-container-->
	<center style="margin-top: -15px;">Versi 1.0 Sari Rahmawati&copy;
	</center>
	
	<script type="text/javascript">
	$(document).ready(function(){
		$(" #alert" ).fadeOut(6000);
	});
	</script>
	  
    </div>
  
</body></html>

