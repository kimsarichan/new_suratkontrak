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
          <div class="container" style="width:1030px">
          <br><br>
          <table id="table_surat" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nomor Surat</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th>Tugas</th>
                <th>Perusahaan</th>
                <th style="width:250px;">Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
         	<div class="col-lg-5">
         		<a class="btn btn-sm btn-primary" href="" title="Edit" ><i class="glyphicon glyphicon-arrow-left"></i>Back </a>
         		<a class="btn btn-sm btn-danger" href=<?php echo  site_url("Con_karyawan/print_data_personal_karyawan/$data_karyawan->idKaryawan")?> title="Edit" ><i class="glyphicon glyphicon-print"></i> Print </a>
        	</div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript">
 var save_method; //for save method string
  var id = "<?php echo $data_karyawan->idKaryawan; ?>";
  var table;
  $(document).ready(function() {
    table = $('#table_surat').DataTable({ 
      
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('con_karyawan/ajax_list_surat/"+id+"')?>",
          "type": "POST"
      },

      //Set column definition initialisation properties.
      "columnDefs": [
      { 
        "targets": [ -1 ], //last column
        "orderable": false, //set not orderable
      },
      ],

    });
  });
  function reload_table()
  {
    table.ajax.reload(null,false); //reload datatable ajax 
  }


 
</script>
<!--- print -->
