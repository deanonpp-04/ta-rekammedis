<p>
    <a href="<?php echo base_url('admin/obat/create') ?>" class="btn-success btn-sm">
        <i class="fa fa-plus"></i> Tambah Data Obat
    </a>
</p>

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
            <th>No</th>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($obat as $obat) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $obat->kd_obat ?></td>
            <td><?php echo $obat->nama_obat ?></td>
            <td><?php echo $obat->harga ?></td>
            <td><?php echo $obat->satuan ?></td>
            <td>
                <a href="<?php echo base_url('admin/obat/edit/' .$obat->id_obat) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                <?php include('delete.php')?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table> 