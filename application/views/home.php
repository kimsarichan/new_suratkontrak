 <div class="container" style="width:1030px">
  <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-3">
                            <i class="glyphicon glyphicon-plus  fa-5x "></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>Surat Karyawan Kontrak</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url('index.php/Con_karyawan/tambah_karyawan') ?>">
                    <div class="panel-footer">
                        <span class="pull-left">Tambah Surat</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-14">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align:center">
                             Pemberitahuan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <h4>Kontrak habis kurang dari 2 minggu lagi</h4>
                            <!--list karyawan habis kontrak selama 2 minggu-->
                            <div class="list-group">
                                <?php foreach ($karyawanlist2minggu as $karyawan) {?>
                                    <a href=<?php echo site_url("Con_karyawan/lihat/".$karyawan->idKaryawan)?> class="list-group-item">
                                        <?php echo $karyawan->nama?>
                                        <?php $now = new DateTime();
                                        $tglBerakhir = new DateTime($karyawan->tglBerakhir);
                                        $datediff = $now->diff($tglBerakhir);?>
                                        <span class="pull-right text muted small"><?php echo $datediff->days+1, " hari lagi";?></span>
                                    </a>
                                <?php };?>
                            </div>
                            <!-- /.list-group -->
                            <h4>Kontrak habis kurang dari 1 bulan lagi</h4>
                            <!--list karyawan habis kontrak selama 2 minggu-->
                            <div class="list-group">
                                <?php foreach ($karyawanlist1bulan as $karyawan) {?>
                                    <a href=<?php echo site_url("Con_karyawan/lihat/".$karyawan->idKaryawan)?> class="list-group-item">
                                        <?php echo $karyawan->nama?>
                                        <?php $now = new DateTime();
                                        $tglBerakhir = new DateTime($karyawan->tglBerakhir);
                                        $datediff = $now->diff($tglBerakhir);?>
                                        <span class="pull-right text muted small"><?php echo $datediff->days+1, " hari lagi";?></span>
                                    </a>
                                <?php };?>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>