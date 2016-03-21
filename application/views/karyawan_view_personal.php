<div class="container" style="width:1030px">
	<h2>Data Karyawan</h2>
	<div class="row">
        <div class="col-lg-8" >
             <form role="form" >
                 <div class="form-group">
                    <label class="control-label col-md-3">Nama</label>
              		<div class="col-md-9">
                		<input placeholder="<?php echo $data_karyawan->nama ?>" class="form-control" type="text" disabled>
              		</div>
                 </div>
                 <br><br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3">Unit Pekerjaan </label>
              		<div class="col-md-9">
                		<input placeholder="<?php echo $data_karyawan->tingkatPekerjaan ?>" class="form-control" type="text" disabled>
              		</div>
                 </div>
                 <br><br>
                 <div class="form-group">
                    <label class="control-label col-md-3">Nomor BPJS </label>
                  <div class="col-md-9">
                    <input placeholder="<?php echo $data_karyawan->Nomorbpjs?>" class="form-control" type="text" disabled>
                  </div>
                 </div>
                 <br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nomor Rekening </label>
                  <div class="col-md-9">
                    <input placeholder="<?php echo $data_karyawan->Norek?>" class="form-control" type="text" disabled>
                  </div>
                 </div>
                 <br><br>
                 <div class="form-group">
                    <label class="control-label col-md-3">Alamat</label>
              		<div class="col-md-9">
                		<input placeholder="<?php echo $data_karyawan->alamat ?>" class="form-control" type="text" disabled>
              		</div>
                 </div>
                 <br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3">Tempat Lahir </label>
              		<div class="col-md-9">
                		<input placeholder="<?php echo $data_karyawan->tempatLahir ?>" class="form-control" type="text" disabled>
              		</div>
                 </div>
                 <br><br>
                 <div class="form-group">
                    <label class="control-label col-md-3">Tanggal Lahir </label>
              		<div class="col-md-9">
                		<input placeholder="<?php echo $data_karyawan->tglLahir ?>" class="form-control" type="text" disabled>
              		</div>
                 </div>
                 <br><br>
                 <div class="form-group">
                    <label class="control-label col-md-3">Pendidikan Terakhir </label>
              		<div class="col-md-9">
                		<input placeholder="<?php echo $data_karyawan->pendidikan ?>" class="form-control" type="text" disabled>
              		</div>
                 </div>
         	</form>
         	<br><br>
         	<div class="col-lg-5">
         		<a class="btn btn-sm btn-primary" href="" title="Edit" ><i class="glyphicon glyphicon-arrow-left"></i>Back </a>
         		<a class="btn btn-sm btn-danger" href="" onclick="printDiv('printableArea')" title="Edit" ><i class="glyphicon glyphicon-print"></i> Print </a>
        	</div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<!--- print -->

<div id='printableArea' class='hidden'>
  <p>Nama: <?php echo $data_karyawan->nama ?></p> 
  <p>Tempat lahir: <?php echo $data_karyawan->tempatLahir ?></p> 
  <p>Tanggal lahir: <?php echo $data_karyawan->tglLahir ?></p> 
  <p>Pendidikan : <?php echo $data_karyawan->pendidikan ?></p> 
</div>
