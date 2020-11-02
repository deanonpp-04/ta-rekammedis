<table class="table table-striped">

<tbody>
    <tr>
    <th scope="row">Kode Pasien</th>
    <td><?php echo $pasien->kd_pasien ?></td>
    </tr>
    <tr>
    <th scope="row">Nama Pasien</th>
    <td><?php echo $pasien->nama_pasien ?></td>
    </tr>
    <tr>
    <th scope="row">Jenis Kelamin</th>
    <td><?php echo $pasien->jenis_kelamin ?></td>
    </tr>
    <tr>
    <th scope="row"> Tanggal Lahir</th>
    <td><?php echo $pasien->tgl_lahir ?></td>
    </tr>
    <!-- <tr>
    <th scope="row"> Usia</th>
    <td><?php echo $pasien->usia ?></td>
    </tr> -->
    <tr>
    <th scope="row"> Golongan Darah</th>
    <td><?php echo $pasien->goldar ?></td>
    </tr>
    <tr>
    <th scope="row"> Nomor Handphone</th>
    <td><?php echo $pasien->no_hp ?></td>
    </tr>
    <tr>
    <th scope="row"> Pekerjaan </th>
    <td><?php echo $pasien->pekerjaan ?></td>
    </tr>

    <tr>
    <th scope="row">Alamat</th>
    <td><?php echo $pasien->alamat ?></td>
    </tr>

    
    </tr>
    <tr>
    <td>
    <a href="<?php echo base_url('dokter/pasien') ?>" class="btn btn-success btn-xs"> Kembali</a></td>
    </tr>
</tbody>
</table>