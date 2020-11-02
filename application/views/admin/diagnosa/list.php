<p>
    <a href="<?php echo base_url('admin/diagnosa/create') ?>" class="btn-success btn-sm">
        <i class="fa fa-plus"></i> Tambah Data Diagnosa
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
            <th>Kode Diagnosa</th>
            <th>Nama Diagnosa</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($diagnosa as $diagnosa) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $diagnosa->kd_diagnosa ?></td>
            <td><?php echo $diagnosa->nama_diagnosa ?></td>
            <td>
                <a href="<?php echo base_url('admin/diagnosa/edit/' .$diagnosa->id_diagnosa) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                <?php include('delete.php')?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table> 