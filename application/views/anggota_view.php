  <div class="container" style="width:1030px">
    <h2>Data Anggota</h2>
    <br />
    <?php
    if($this->session->userdata('logged_in')==true AND $this->session->userdata('username')!=''){?>
    <button class="btn btn-success" onclick="add_anggota()"><i class="glyphicon glyphicon-plus"></i> Add Anggota</button>
    <?php } ?>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>NIM</th>
          <th>Nama</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Jurusan</th>
          <th>Tahun Masuk Kuliah</th>
          <th>Tahun Masuk UKM</th>
          <th>Telepon</th>
      <?php
          if($this->session->userdata('logged_in')==true AND $this->session->userdata('username')!=''){?>
          <th style="width:125px;">Action</th>
          <?php } ?>
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
            "url": "<?php echo site_url('con_anggota/ajax_list')?>",
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

    function add_anggota()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Anggota'); // Set Title to Bootstrap modal title
    }

    function edit_anggota(nim)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('con_anggota/ajax_edit/')?>/" + nim,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="nim"]').val(data.id);
            $('[name="nim"]').val(data.nim);
            $('[name="nama"]').val(data.nama);
            $('[name="tempat_lahir"]').val(data.tempat_lahir);
            $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
            $('[name="jurusan"]').val(data.jurusan);
            $('[name="tahun_kuliah"]').val(data.tahun_kuliah);
            $('[name="tahun_masuk_ukm"]').val(data.tahun_masuk_ukm);
            $('[name="no_telp"]').val(data.no_telp);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Anggota'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

    function save()
    {
      var url;
      if(save_method == 'add') 
      {
          url = "<?php echo site_url('con_anggota/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('con_anggota/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_anggota(nim)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('con_anggota/ajax_delete')?>/"+nim,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }

  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Anggota Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="nim"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">NIM</label>
              <div class="col-md-9">
                <input name="nim" placeholder="NIM" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama</label>
              <div class="col-md-9">
                <input name="nama" placeholder="Nama" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Tempat Lahir</label>
              <div class="col-md-9">
                <input name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Tanggal Lahir</label>
              <div class="col-md-9">
                <input name="tanggal_lahir" placeholder="yyyy-mm-dd" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Jurusan</label>
              <div class="col-md-9">
                <input name="jurusan" placeholder="Jurusan" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Tahun Kuliah</label>
              <div class="col-md-9">
                <input name="tahun_kuliah" placeholder="Tahun Kuliah" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Tahun Masuk UKM</label>
              <div class="col-md-9">
                <input name="tahun_masuk_ukm" placeholder="Tahun Masuk UKM" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Telepon</label>
              <div class="col-md-9">
                <input name="no_telp" placeholder="Telepon" class="form-control" type="text">
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
  </body>
</html>