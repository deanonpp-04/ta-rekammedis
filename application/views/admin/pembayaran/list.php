

<?php
//Notifikasi
if($this->session->flashdata('sukses')){
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <!-- <th>ID Dokter</th> -->
            <th class="text-center">Tanggal Periksa</th>
            <th class="text-center">Nama Pasien</th>
            <!-- <th>Nama Dokter</th>
            <th>Keluhan</th> -->
            <th class="text-center">Penyakit</th>
            <th class="text-center">Biaya Periksa</th>
            <!-- <th>Keterangan</th> -->
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($pemeriksaan as $pemeriksaan) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $pemeriksaan->tgl_periksa ?></td>
            <td><?php echo $pemeriksaan->nama_pasien ?></td>
            <!-- <td><?php echo $pemeriksaan->nama_dokter ?></td>
            <td><?php echo $pemeriksaan->keluhan ?></td> -->
            <td><?php echo $pemeriksaan->nama_diagnosa ?></td>
            <td><?php echo format_rp($pemeriksaan->biaya_periksa); ?></td>
            <!-- <td><?php echo $pemeriksaan->keterangan ?></td> -->
            <td class="text-center">
                
                <a href="<?php echo base_url('admin/pembayaran/detail_data/' .$pemeriksaan->id_periksa) ?>" class="btn btn-success"> <i class="fa fa-info"></i>  Detail</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table> 