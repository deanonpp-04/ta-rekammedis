<div class="col-md-4">
    <div class="row">
        <h3 class="col-md-12 ">Informasi Pembayaran</h3>
    </div>
    <div class="row">
        <label class="col-md-6" style="margin-top: 10px">Tanggal</label>
        <h4 class="col-md-6 text-right"> <?= $pemeriksaan->tanggal ?></h4>
    </div>
    <div class="row">
        <label class="col-md-6" style="margin-top: 10px">Nama Pasien</label>
        <h4 class="col-md-6 text-right"> <?= $pemeriksaan->nama_pasien ?></h4>
    </div>

    <hr>
    <div class="row">
        <label class="col-md-6" style="margin-top: 10px">Biaya Periksa</label>
        <h4 class="col-md-6 text-right"> <?= format_rp($pemeriksaan->biaya_periksa) ?></h4>
    </div>

    <div class="row">
        <label class="col-md-6" style="margin-top: 10px">Biaya Obat</label>
        <h4 class="col-md-6 text-right"> <?= format_rp($biaya) ?></h4>
    </div>
    <hr>
    <div class="row">
        <label class="col-md-6" style="margin-top: 10px">Total Bayar</label>
        <h4 class="col-md-6 text-right"> <?= format_rp($biaya + $pemeriksaan->biaya_periksa) ?></h4>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 ">
            <a href="<?php echo base_url('admin/pembayaran') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#bayar-<?php echo $pemeriksaan->id_periksa ?>">
                    <i class="fa fa-check"></i> Bayar
            </button>
            <a target="_blank" href="<?php echo base_url('admin/pembayaran/cetak/'.$pemeriksaan->id_periksa) ?>" class="btn btn-info"><i class="fa fa-print"></i> Print</a>
        </div>

    </div>
</div>

<!-- <div class="col-md-8">
    <table class="table">
        <thead>
             <div class="row">
                <h3 class="col-md-12 ">Detail</h3>
            </div>
    
        </thead>
    <tbody>

            <tr>
                <th scope="row">Tanggal Periksa</th>
                <td><?php echo $pemeriksaan->tgl_periksa ?></td>
            </tr>

            <tr>
                <th scope="row"> Nama Pasien</th>
                <td><?php echo $pemeriksaan->nama_pasien ?></td>
            </tr>
            <tr>
                <th scope="row"> Nama Dokter</th>
                <td><?php echo $pemeriksaan->nama_dokter ?></td>
            </tr>

            <tr>
                <th scope="row"> Keluhan </th>
                <td><?php echo $pemeriksaan->keluhan ?></td>
            </tr>

            <tr>
                <th scope="row">Penyakit</th>
                <td><?php echo $pemeriksaan->nama_diagnosa ?></td>
            </tr>

            <tr>
                <th scope="row">Tindakan</th>
                <td><?php echo $pemeriksaan->nama_tindakan ?></td>
            </tr>

            <tr>
                <th scope="row">Obat</th>
                <td>
                    <?php
                    $i = 1; 
                    foreach ($obat as $row) {
                        echo $i.'. ';
                        echo $row->nama_obat.'<br>';
                        $i++;

                    }
                    // var_dump($obat);
                    ?>
                    
                </td>
            </tr>
           
            <tr>
                <th scope="row"> Keterangan</th>
                <td><?php echo $pemeriksaan->keterangan ?></td>
            </tr>
        


        </tr>
        <tr>
            <td>
                
            </td>
        </tr>
    </tbody>
    </table>
</div> -->

<div class="modal fade" id="bayar-<?php echo $pemeriksaan->id_periksa ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">PEMBAYARAN</h4>
        </div>
        <div class="modal-body">
            <div class="callout callout-warning">
                <h4>Peringatan!</h4>
                    Yakin melanjutkan pembayaran?
            </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tidak</button>
        <?php 
            $total_biaya = $biaya + $pemeriksaan->biaya_periksa;
        ?>
        <a href="<?php echo base_url('admin/pembayaran/bayar/'.$pemeriksaan->id_periksa.'/'.$biaya.'/'.$total_biaya) ?>" class="btn btn-success "><i class="fa fa-check"></i> Ya</a>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

