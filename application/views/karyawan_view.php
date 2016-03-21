 <div class="container" style="width:1030px">
    <h2>Data Anggota</h2>
    <br >
    <br >
    <br >
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Nama</th>
          <th>Status</th>
          <th>Unit Pekerjaan</th>
          <th>Pendidikan</th>
          <th style="width:250px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

  <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>


  <script type="text/javascript">

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('con_karyawan/ajax_list')?>",
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

    function delete_anggota(idKaryawan)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('con_karyawan/ajax_delete')?>/"+idKaryawan,
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
    function edit_anggota(idKaryawan)
    {
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('con_karyawan/ajax_edit/')?>/" + idKaryawan,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="nama"]').val(data.nama);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Anggota'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Anggota'); // Set title to Bootstrap modal title
            alert('Error get data from ajax');
        }
    });
    }

  </script>


  <!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 class="modal-title">Karyawan Form</h3>
  </div>
  <div class="modal-body form">
    <form action="#" id="form" class="form-horizontal">
      <input type="hidden" value="" name="nim"/> 
      <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Nama</label>
          <div class="col-md-9">
            <input name="nama" placeholder="nama" class="form-control" type="text">
          </div>
        </div>
      </div>
       <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Alamat</label>
          <div class="col-md-9">
            <input name="alamat" placeholder="alamat" class="form-control" type="text">
          </div>
        </div>
      </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->