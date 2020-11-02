<!-- <p>
    <a href="<?php echo base_url('admin/setting/create') ?>" class="btn-success btn-sm">
        <i class="fa fa-plus"></i> Tambah Data Setting
    </a>
</p> -->

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
            <th>Nama Praktik </th>
            <th>Logo</th>
            <th>Nomor Telepon </th>
            <th>Email </th>
            <th>Alamat </th>
            <th>Keterangan </th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($setting as $setting) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $setting->nama_praktik?></td>
            <td><?php echo $setting->logo ?></td>
            <td><?php echo $setting->no_telp ?></td>
            <td><?php echo $setting->email ?></td>
            <td><?php echo $setting->alamat ?></td>
            <td><?php echo $setting->keterangan ?></td>
                <td>
                <a href="<?php echo base_url('admin/setting/edit/' .$setting->id_setting) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?php echo base_url('admin/setting/detail2/' .$setting->id_setting) ?>" class="btn btn-info btn-xs"> Detail</a>
                <?php include('delete.php')?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table> 