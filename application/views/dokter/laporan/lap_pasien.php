<div class="breadcrumbs">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                        <div class="col-md-12">
                        
                                <!-- page content -->
                        <div class="right_col" role="main">
                            <div class="card-header bg-info" >
                                <center> <strong class="card-title text-white"> <h3>LAPORAN DATA PEMERIKSAAN PASIEN</h3></strong></center>
                            </div>
                            <div class="card-body">
                        <div id="body">
                            <form action="<?php echo site_url('dokter/laporan_pasien/pasien') ?>" method="POST" target="_blank">
                            <div class="form-group row">
                                    <div class="col-md-5">
                                        <label>Pilih Tahun</label>
                                        
                                        <select class="select2_single form-control" name="tahun">
                                            <!-- <option value="" disabled selected>- Pilih Tahun -</option> -->
                                            <?php
                                                $tahun = date('Y');
                                                for($x = $tahun; $x >= 2015; $x--){
                                                ?>
                                                <option name="tahun" value="<?php echo $x?>"><?php echo $x ?></option>
                                                <?php } ?>
                                            }
                                        </select>
                                    </div>
                            

                <div class="col-md-5">
                    <label>Pilih Bulan</label>                  
                    <select class="select2_single form-control" name="bulan">
                        <option value="" disabled selected>- Pilih Bulan -</option>
                        <option name="bulan" value="1" <?php echo set_select('bulan', 1, $bulan==1)?>>Januari</option>
                        <option name="bulan" value="2" <?php echo set_select('bulan', 2, $bulan==2)?>>Februari</option>
                        <option name="bulan" value="3" <?php echo set_select('bulan', 3, $bulan==3)?>>Maret</option>
                        <option name="bulan" value="4" <?php echo set_select('bulan', 4, $bulan==4)?>>April</option>
                        <option name="bulan" value="5" <?php echo set_select('bulan', 5, $bulan==5)?>>Mei</option>
                        <option name="bulan" value="6" <?php echo set_select('bulan', 6, $bulan==6)?>>Juni</option>
                        <option name="bulan" value="7" <?php echo set_select('bulan', 7, $bulan==7)?>>Juli</option>
                        <option name="bulan" value="8" <?php echo set_select('bulan', 8, $bulan==8)?>>Agustus</option>
                        <option name="bulan" value="9" <?php echo set_select('bulan', 9, $bulan==9)?>>September</option>
                        <option name="bulan" value="10" <?php echo set_select('bulan', 10, $bulan==10)?>>Oktober</option>
                        <option name="bulan" value="11" <?php echo set_select('bulan', 11, $bulan==11)?>>November</option>
                        <option name="bulan" value="12" <?php echo set_select('bulan', 12, $bulan==12)?>>Desember</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <button type="submit" class="btn btn-success btn-xm"><i class="fa fa-print"></i> Cetak</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- /page content -->