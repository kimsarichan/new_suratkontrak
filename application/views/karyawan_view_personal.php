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
                  <br><br>
                 </div>
                    <div class="form-group">
                    <label class="control-label col-md-3">Nomor Telepon </label>
                  <div class="col-md-9">
                    <input placeholder="<?php echo $data_karyawan->NomorTelp?>" class="form-control" type="text" disabled>
                  </div>
                 </div>
                 <br><br><br>
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
         		<a class="btn btn-sm btn-primary" href="" ><i class="glyphicon glyphicon-arrow-left"></i>Back </a>
            <a class="btn btn-sm btn-success" href="javascript:void()"  onclick="add_surat()" title="tambah surat" ><i class="glyphicon glyphicon-pencil"></i>Tambah Surat </a>
         		<a class="btn btn-sm btn-danger" href=<?php echo  site_url("Con_karyawan/print_data_personal_karyawan/$data_karyawan->idKaryawan")?> title="Edit" ><i class="glyphicon glyphicon-print"></i> Print </a>
        	</div>
        </div>
    </div>
</div>
<?php  $this->load->view('modal_surat');?>
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

 function delete_surat(idSurat)
  {
    if(confirm('Apa anda akan menghapus data ini?'))
    {
      // ajax delete data to database
        $.ajax({
          url : "<?php echo site_url('con_karyawan/ajax_delete_surat')?>/"+idSurat,
          type: "POST",
          dataType: "JSON",
          success: function()
          {
             //if success reload ajax table
             reload_table();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              reload_table();
          }
      });
       
    }
  }
 $(document).ready(function() {
    $('#datetimepicker4').datepicker();
})
     function add_surat()
    {
      $('#modal_new').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Anggota'); // Set Title to Bootstrap modal title
    }
     function save()
    {
      var url = "<?php echo site_url('con_karyawan/ajax_add_surat')?>";
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_new').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
</script>
<!--- print -->
