<?php
//Notifikasi
if($this->session->flashdata('sukses')){
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<div class="row">
    <div class="col-md-12">
        <form method="post" action="<?= base_url('admin/rekam_medis/search') ?>">
            <label>Pilih Pasien</label>
            <select name="id_pasien" class="form-control selectpicker" data-live-search="true">
                <option> --Pilih Data--</option>
                <?php foreach ($pasien as $data): ?>
                    <option value="<?= $data->id_pasien ?>"><?= $data->nama_pasien ?></option>
                <?php endforeach ?>
            </select>
            <button class="btn btn-info"><i class="fa fa-search"></i> Search</button>
        </form>

    </div>
</div>


<?php if ($rekam_medis != null): ?>
    
    <hr>
    <br>
    <div class="col-md-12">
        <div class="form-group">
            <label>Nama Pasien</label><br>
            <h4><?= $nama_pasien->nama_pasien.' / '.$umur?></h4>
        </div>
        <div class="form-group">
            <label>Golongan Darah</label><br>
            <h4><?= $nama_pasien->goldar ?></h4>
        </div>
        <hr>
        <label>Riwayat Medis</label>

        <table class="table " id="example1">
            <thead>
                <tr>
                    <th>No</t>
                    <th>Tanggal Periksa</th>
                    <th>Keluhan</th>
                    <th>Penyakit</th>
                    <th>Tindakan</th>
                    <th>Obat</th>
                    <th>Biaya</th>
                </tr>
            </thead>
        <tbody>
                <?php $temp = []; ?>
                <?php 
                $no=1; 
                for($i = 0; $i < sizeof($rekam_medis) ; $i++) { ?>
                <tr>
                    <?php if (!in_array($rekam_medis[$i]['id_periksa'],$temp) ): ?>

                        <td  ><?=$no++ ?></td>
                        <td ><?php echo $rekam_medis[$i]['tgl_periksa']?></td>
                        <td ><?php echo $rekam_medis[$i]['keluhan'] ?></td>
                        <td ><?php echo $rekam_medis[$i]['nama_diagnosa'] ?></td>
                        <td ><?php echo $rekam_medis[$i]['nama_tindakan'] ?></td>
                        <td >
                            
                            <?php 
                            $num = 1;
                            for($j = 0 ; $j < sizeof($rekam_medis) ; $j++){
                                if ($rekam_medis[$j]['id_periksa'] == $rekam_medis[$i]['id_periksa'] ) {
                                    echo $num++.'. '.$rekam_medis[$j]['nama_obat'].'<br>';
                                }
                                
                            }
                            
                            ?>
                        </td>
                        <td ><?= format_rp($rekam_medis[$i]['total_biaya']) ?></td>
                        <?php array_push($temp, $rekam_medis[$i]['id_periksa']) ?>
                    <?php endif ?>
                    
                </tr>
                <?php 
                } ?>
            </tbody>
        </table> 
        <a target="_blank" href="<?= base_url('admin/rekam_medis/cetak/'.$nama_pasien->id_pasien) ?>"><button class="btn btn-info"><i class="fa fa-print"></i> Cetak</button></a>
    </div>
    
<?php endif ?>