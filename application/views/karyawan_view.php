<div class="container" style="width:1030px">
  <h2>Data Anggota</h2>
  <br >
  <br >
  <br >
  <a class="btn btn-sm btn-danger" href="" onclick="printDiv('printableArea')" title="Edit" ><i class="glyphicon glyphicon-print"></i> Print </a>
  <br><br>
  <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <th>Status</th>
        <th>Perusahaan</th>
        <th>Unit Pekerjaan</th>
        <th>Pendidikan</th>
        <th style="width:250px;">Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
<?php  $this->load->view('modal_karyawan');?>
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap-datepicker.js')?>"></script>


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

  function delete_karyawan(idKaryawan)
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
  function edit_karyawan(idKaryawan)
  {
    $('#form')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo site_url('con_karyawan/ajax_edit/')?>/" + idKaryawan,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="idKaryawan"]').val(data.idKaryawan);
        $('[name="nama"]').val(data.nama);
        $('[name="alamat"]').val(data.alamat);
        $('[name="tempatLahir"]').val(data.tempatLahir);
        $('[name="tglLahir"]').val(data.tglLahir);
        $('[name="tingkatPekerjaan"]').val(data.tingkatPekerjaan);
        $('[name="NomorBPJS"]').val(data.NomorBPJS);
        $('[name="Norek"]').val(data.Norek);
        $('#modal_form').modal('show'); // show bootstrap modal twhen complete loaded
        $('.modal-title').text('Edit Karyawan'); // Set title to Bootstrap modal title
      },
      error: function (jqXHR, textStatus, errorThrown)
      {            
          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Edit Anggota'); // Set title to Bootstrap modal title
          alert('Error get data from ajax');
      }
  });
  }
   function save()
    {
      var url = "<?php echo site_url('con_karyawan/ajax_update')?>";

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

</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#datetimepicker4').datepicker();
})
</script>
