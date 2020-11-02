<p>
    <a href="<?php echo base_url('admin/user/create') ?>" class="btn-success btn-sm">
        <i class="fa fa-plus"></i> Tambah Data User
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
            <th>Nama</th>
            <th>Email</th>
            <th>Gambar</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($user as $user) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $user->nama ?></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->gambar ?></td>
            <td><?php echo $user->level ?></td>
            <!-- <td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$user->gambar)?>" class="img img-responsive img-thumbnail" width="150">
            </td> -->
            <td>
                <a href="<?php echo base_url('admin/user/edit/' .$user->id_user) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                <!-- <a href="<?php echo base_url('admin/user/detail2/' .$user->id_user) ?>" class="btn btn-info btn-xs"> Detail</a> -->

                <?php include('delete.php')?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table> 