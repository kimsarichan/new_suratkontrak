<!-- Bootstrap modal -->
<div class="modal fade" id="modal_new" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 class="modal-title">Form Surat</h3>
  </div>
  <div class="modal-body form">
    <form action="#" id="form" class="form-horizontal">
      <input type="hidden" value="<?php echo $data_karyawan->idKaryawan?>" name="idKaryawan"/> 
       <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Nomor Surat</label>
          <div class="col-md-9">
            <input name="nomor" placeholder="nomor" class="form-control" type="text">
          </div>
        </div>
      <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Perusahaan </label>
          <div class="col-md-9">
            <select name="idPerusahaan"class="form-control">
              <option value="1">Silen</option>
              <option value="2">Koperasi</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Tugas </label>
          <div class="col-md-9">
            <input name="tugas" placeholder="tugas" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Penempatan Karyawan </label>
          <div class="col-md-9">
            <input name="penempatanKaryawan" placeholder="Penempatan Karyawan" class="form-control" type="text">
          </div>
        </div>
      </div>
      <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Gaji </label>
          <div class="col-md-9">
            <input name="gaji" placeholder="gaji" class="form-control" type="text">
          </div>
        </div>
      </div>
       <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Tanggal Berakhir </label>       
          <div class="col-md-9">
            <input name="tglBerakhir" placeholder="tglBerakhir" class="form-control" data-date-format="yyyy-mm-dd" id='datetimepicker4' type="text">
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