<?php
//Notifikasi
if($this->session->flashdata('sukses')){
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>
<a href="<?= base_url('admin/pemeriksaan/create') ?>"><button class="btn btn-info" s> <i class="fa fa-plus"></i> Pemeriksaan Baru</button></a>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No</th>
            <!-- <th>ID Dokter</th> -->
            <th>Tanggal Periksa</th>
            <th>Nama Pasien</th>
            <!-- <th>Nama Dokter</th>
            <th>Keluhan</th> -->
            <th>Penyakit</th>
            <th>Biaya Periksa</th>
            <!-- <th>Keterangan</th> -->
            <th>Aksi</th>
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
            <td><?php echo $pemeriksaan->biaya_periksa ?></td>
            <!-- <td><?php echo $pemeriksaan->keterangan ?></td> -->
            <td>
                <a href="<?php echo base_url('admin/pemeriksaan/edit/' .$pemeriksaan->id_periksa) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?php echo base_url('admin/pemeriksaan/detail2/' .$pemeriksaan->id_periksa) ?>" class="btn btn-info btn-xs"> Detail</a>

                <?php include('delete.php')?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table> 