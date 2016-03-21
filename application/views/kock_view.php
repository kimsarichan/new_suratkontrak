  <div class="container" style="width:1030px">
    <h2>Data Kock</h2>
    <br />
    <?php
    if($this->session->userdata('logged_in')==true AND $this->session->userdata('username')!=''){?>
    <button class="btn btn-success" onclick="add_kock()"><i class="glyphicon glyphicon-plus"></i> Add Transaksi Shuttlekock</button>
    <?php } ?>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Tanggal Permainan</th>
          <th>Jumlah Terpakai</th>
          <th>Total Bayar</th>
          <th>Status</th>
          <?php
    if($this->session->userdata('logged_in')==true AND $this->session->userdata('username')!=''){?>
          <th style="width:200px;">Action</th>
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
            "url": "<?php echo site_url('con_kock/ajax_list')?>",
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

    function add_kock()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Kock'); // Set Title to Bootstrap modal title
    }

    function edit_kock(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('con_kock/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
                       $('[name="id_hutang"]').val(data.id_hutang);
            $('[name="tanggal_permainan"]').val(data.tanggal_permainan);
            $('[name="jumlah_terpakai"]').val(data.jumlah_terpakai);
            $('[name="total_bayar"]').val(data.total_bayar);
            $('[name="status"]').val(data.status);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Kock'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function detail_kock(id)
    {
      save_method = 'detail';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('con_kock/ajax_detail/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          alert(data)
            $('#modal_table').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Detail Kock'); // Set title to Bootstrap modal title
            
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
          url = "<?php echo site_url('con_kock/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('con_kock/ajax_update')?>";
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

    function delete_kock(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('con_kock/ajax_delete')?>/"+id,
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
        <h3 class="modal-title">Kock Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id_hutang"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Tanggal Permainan</label>
              <div class="col-md-9">
                <input name="tanggal_permainan" placeholder="yyyy-mm-dd" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Jumlah Terpakai</label>
              <div class="col-md-9">
                <input name="jumlah_terpakai" placeholder="Jumlah Terpakai" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Total Bayar</label>
              <div class="col-md-9">
                <input name="total_bayar" placeholder="Total Bayar" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Status</label>
              <div class="col-md-9">
                <input name="status" placeholder="Status" class="form-control" type="text">
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

    <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_table" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="container" style="width:500px">
          <h2>Data Kock</h2>
          <br />
          <button class="btn btn-success" onclick="add_kock()"><i class="glyphicon glyphicon-plus"></i> Add Transaksi Shuttlekock</button>
          <br />
          <br />
          <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>NIM</th>
                <th style="width:200px;">Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  </body>
</html>