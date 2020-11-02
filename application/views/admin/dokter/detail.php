<table class="table table-striped">

<tbody>
    <tr>
    <th scope="row">NIP</th>
    <td><?php echo $dokter->nip ?></td>
    </tr>
    <tr>
    <th scope="row">Nama Dokter</th>
    <td><?php echo $dokter->nama_dokter ?></td>
    </tr>
    <tr>
    <th scope="row">Jenis Kelamin</th>
    <td><?php echo $dokter->jenis_kelamin ?></td>
    </tr>
    <tr>
    <th scope="row"> Email</th>
    <td><?php echo $dokter->email ?></td>
    </tr>
    <tr>
    <th scope="row"> Nomor Telepon</th>
    <td><?php echo $dokter->no_telp ?></td>
    </tr>
    <tr>
    <th scope="row"> Alamat </th>
    <td><?php echo $dokter->alamat ?></td>
    </tr>
    
    <tr>
    <td>
    <a href="<?php echo base_url('admin/dokter') ?>" class="btn btn-success btn-xs"> Kembali</a></td>
    </tr>
</tbody>
</table>