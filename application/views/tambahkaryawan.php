<div class="container" style="width:1030px">
	<h2>Buat Data Karyawan</h2>
  <div class="row">
    <form method = "post"action = <?php echo base_url()."index.php/Con_karyawan/tambah";?> >
    <div class="col-lg-4" >
      <button type="submit" value="print" name="action" class="btn btn-primary">Print Surat</button>
    </div>
	<div class="row">
        <div class="col-lg-8" >
                 <br>
                 <div class="form-group">
                    <label class="control-label col-md-3">Nama</label>
              		<div class="col-md-9">
                		<input placeholder="nama" name="nama" class="form-control" type="text" required >
              		</div>
                 </div>
                 <br><br>
                 <div class="form-group">
                    <label class="control-label col-md-3">Tempat Lahir </label>
                  <div class="col-md-9">
                    <input placeholder="tempat lahir" name="tempatLahir" class="form-control" type="text" required>
                  </div>
                 </div>
                 <br><br>
                 <div class="form-group">
                    <label class="control-label col-md-3">Tanggal Lahir </label>
                  <div class="col-md-9">
                    <input placeholder="tanggal lahir" name="tglLahir" class="form-control" type="text" required>
                  </div>
                 </div>
                 <br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3">Id Karyawan</label>
                  <div class="col-md-9">
                    <input placeholder="ID Karyawan" name="idkar" class="form-control" type="text" required>
                  </div>
                 </div>
                 <br><br>
                 <div class="form-group">
                    <label class="control-label col-md-3">Pendidikan Terakhir </label>
                  <div class="col-md-9">
                     <select name="pendidikan" class="form-control">
                        <option value="SD" >SD</option>
                        <option value="SMP" >SMP</option>
                        <option value="SMA" >SMA</option>
                        <option value="D1" >D1</option>
                        <option value="D2" >D2</option>
                        <option value="D3" >D3</option>
                        <option value="S1" >S1</option>
                        <option value="S2" >S2</option>
                        <option value="S3" >S3</option>
                      </select>
                  </div>
                  <br><br><br>
                <div class="form-group">
                  <label class="control-label col-md-3">Perusahaan </label>
                  <div class="col-md-9">
                    <select name="idPerusahaan" class="form-control">
                      <option value="1" >Silen</option>
                      <option value="2" >Koperasi</option>
                    </select>
                  </div>
                </div>
              <br><br>
                <div class="form-group">
                    <label class="control-label col-md-3">Alamat</label>
                  <div class="col-md-9">
                    <input placeholder="alamat" name="alamat" class="form-control" type="text" required >
                  </div>
                 </div>
                 <br><br>
                 <div class="form-group">
                <label class="control-label col-md-3">Nomor BPJS </label>
                  <div class="col-md-9">
                 <label class="radio-inline">
                  <input type="radio"  id="scopeRadioPersonal" name="bpjs" value="none" checked="TRUE"> Belum memiliki
                </label>
                <label class="radio-inline">
                  <input type="radio"  id="scopeRadioNone" name="bpjs" value="dalam proses" checked="TRUE"> Dalam Proses
                </label>
                <label class="radio-inline">
                  <input type="radio" id="scopeRadioTeam" name="bpjs" value="active"> Aktif
                </label>
                <span id="teamSelector" style="display:none;">
                  <input placeholder="Nomor bpjs" name="Nomorbpjs" class="form-control" type="text" ><br>
                </span>
                  </div>
                 </div>
                 <br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nomor BPJS TK  </label>
                  <div class="col-md-9">
                    <input placeholder="nomor bpjs" name="NomorbpjsKetenagaKerjaan" class="form-control" type="text" >
                  </div>
                 </div>
                 <br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nomor Rekening </label>
                  <div class="col-md-9">
                    <input placeholder="nomor rekening" name="Norek" class="form-control" type="text" >
                  </div>
                  <br><br>
                 </div>
                    <div class="form-group">
                    <label class="control-label col-md-3">Nomor Telepon </label>
                  <div class="col-md-9">
                    <input placeholder="nomor telepon" name="NomorTelp" class="form-control" type="tel" >
                  </div>
                 </div>
                 <br><br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3">Unit Kerja Bagian </label>
                  <div class="col-md-9">
                    <input placeholder="unit pekerjaan" name="unitKerja" class="form-control" type="text" >
                  </div>
                 </div>
                 <br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nomor Surat</label>
                    <div class="col-md-9">
                      <input name="nomor" placeholder="nomor" class="form-control" type="text">
                    </div>
                  </div>
                <br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3">Tugas </label>
                    <div class="col-md-9">
                      <input name="tugas" placeholder="tugas" class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <br><br>
                  <div class="form-group">
                    <label class="control-label col-md-3">Penempatan Karyawan </label>
                    <div class="col-md-9">
                      <input name="penempatanKaryawan" placeholder="Penempatan Karyawan" class="form-control" type="text" required >
                    </div>
                  </div>
                <br><br>
                <div class="form-group">
                    <label class="control-label col-md-3">Tanggal Berakhir</label>
                    <div class="col-md-9">
                    <input name="tglBerakhir" placeholder="tglBerakhir" class="form-control" data-date-format="yyyy-mm-dd" id='datetimepicker4' type="text" required>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" id="btnSave" value="tambah" name="action"  class="btn btn-primary">Tambah</button>
        </div>
    </div>
</div>
<SCRIPT TYPE="text/javascript">
 $(document).ready(function() {
    $('#datetimepicker4').datepicker();
})
</SCRIPT>
<script type="text/javascript">
$(document).ready(function () {
    $("#scopeRadioPersonal").click(function () {
        document.getElementById('teamSelector').style.display = 'none';
    });
    $("#scopeRadioNone").click(function () {
        document.getElementById('teamSelector').style.display = 'none';
    });
    $("#scopeRadioTeam").click(function () {
        document.getElementById('teamSelector').style.display = 'inline';
    });
});
</script>
