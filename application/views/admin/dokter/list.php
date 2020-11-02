<p>
    <a href="<?php echo base_url('admin/dokter/create') ?>" class="btn-success btn-sm">
        <i class="fa fa-plus"></i> Tambah Data Dokter
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
            <!-- <th>ID Dokter</th> -->
            <th>NIP</th>
            <th>Nama Dokter</th>
            <th>Jenis Kelamin</th>
            <!-- <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th> -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($dokter as $dokter) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <!-- <td><?php echo $dokter->id_dokter ?></td>  -->
            <td><?php echo $dokter->nip ?></td>
            <td><?php echo $dokter->nama_dokter ?></td>
            <td><?php echo $dokter->jenis_kelamin ?></td>
            <!-- <td><?php echo $dokter->email ?></td>
            <td><?php echo $dokter->no_telp ?></td>
            <td><?php echo $dokter->alamat ?></td> -->
            <td>
                <a href="<?php echo base_url('admin/dokter/edit/' .$dokter->id_dokter) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?php echo base_url('admin/dokter/detail2/' .$dokter->id_dokter) ?>" class="btn btn-info btn-xs"> Detail</a>

                <?php include('delete.php')?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table> 