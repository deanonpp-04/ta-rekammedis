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
            <!-- <th>ID pasien</th> -->
            <th>Kode Pasien</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <!-- <th>Tanggal Lahir</th>
            <th>Usia</th>
            <th>Golongan Darah</th> -->
            <th>Nomor Handphone</th>
            <!-- <th>Pekerjaan</th>
            <th>Alamat</th> -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($pasien as $pasien) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <!-- <td><?php echo $pasien->id_pasien ?></td>  -->
            <td><?php echo $pasien->kd_pasien ?></td>
            <td><?php echo $pasien->nama_pasien ?></td>
            <td><?php echo $pasien->jenis_kelamin ?></td>
            <!-- <td><?php echo $pasien->tgl_lahir ?></td> -->
            <!-- <td><?php echo $pasien->usia ?></td> -->
            <!-- <td><?php echo $pasien->goldar ?></td> -->
            <td><?php echo $pasien->no_hp ?></td>
            <!-- <td><?php echo $pasien->pekerjaan ?></td>
            <td><?php echo $pasien->alamat ?></td> -->
            <td>
                <!-- <a href="<?php echo base_url('dokter/pasien/edit/' .$pasien->id_pasien) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a> -->
                <a href="<?php echo base_url('dokter/pasien/detail2/' .$pasien->id_pasien) ?>" class="btn btn-info btn-xs"> Detail</a>
                <!-- <?php include('delete.php')?> -->
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table> 