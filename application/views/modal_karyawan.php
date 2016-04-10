<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 class="modal-title">Form Karyawan</h3>
  </div>
  <div class="modal-body form">
    <form action="#" id="form" class="form-horizontal">
      <input type="hidden" value="idKaryawan" name="idKaryawan"/> 
      <div class="form-body">
        <input name="nama" type="hidden" placeholder="nama" class="form-control" type="text">
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
      <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Tempat Lahir </label>
          <div class="col-md-9">
            <input name="tempatLahir" placeholder="tempatLahir" class="form-control" type="text">
          </div>
        </div>
      </div>
       <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Tanggal Lahir </label>       
          <div class="col-md-9">
            <input name="tglLahir" placeholder="tglLahir" class="form-control" data-date-format="yyyy-mm-dd" id='datetimepicker4' type="text">
        </div>
        </div>
      </div>
       <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Unit Kerja </label>
          <div class="col-md-9">
            <input name="unitKerja" placeholder="unitKerja" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Pendidikan </label>
          <div class="col-md-9">
            <input name="pendidikan" placeholder="pendidikan" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Nomor BPJS </label>
          <div class="col-md-9">
            <input name="Nomorbpjs" placeholder="Nomorbpjs" class="form-control" type="text">
          </div>
        </div>
      </div>
       <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Nomor Rekening </label>
          <div class="col-md-9">
            <input name="Norek" placeholder="Norek" class="form-control" type="text">
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