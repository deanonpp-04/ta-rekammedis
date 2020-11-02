<table class="table table-striped">

<tbody>

        <tr>
            <th scope="row">Tanggal Periksa</th>
            <td><?php echo $pemeriksaan->tgl_periksa ?></td>
        </tr>

        <tr>
            <th scope="row"> Nama Pasien</th>
            <td><?php echo $pemeriksaan->nama_pasien ?></td>
        </tr>
        <tr>
            <th scope="row"> Nama Dokter</th>
            <td><?php echo $pemeriksaan->nama_dokter ?></td>
        </tr>

        <tr>
            <th scope="row"> Keluhan </th>
            <td><?php echo $pemeriksaan->keluhan ?></td>
        </tr>

        <tr>
            <th scope="row">Nama Penyakit</th>
            <td><?php echo $pemeriksaan->nama_diagnosa ?></td>
        </tr>

        <tr>
            <th scope="row">Nama Tindakan</th>
            <td><?php echo $pemeriksaan->nama_tindakan ?></td>
        </tr>

        <tr>
            <th scope="row">Nama Obat</th>
            <td>
                <?php
                $i = 1; 
                foreach ($obat as $row) {
                    echo $i.'. ';
                    echo $row->nama_obat.'<br>';
                    $i++;

                }
                // var_dump($obat);
                ?>
                
            </td>
        </tr>
        <tr>
            <th scope="row"> Biaya Obat</th>
            <td><?php echo format_rp($biaya); ?></td>
        </tr>
        <tr>
            <th scope="row"> Biaya Periksa</th>
            <td><?php echo format_rp($pemeriksaan->biaya_periksa); ?></td>
        </tr>
        <tr>
            <th scope="row"> Total Biaya</th>
            <td><?php echo format_rp($pemeriksaan->biaya_periksa + $biaya); ?></td>
        </tr>
        <tr>
            <th scope="row"> Keterangan</th>
            <td><?php echo $pemeriksaan->keterangan ?></td>
        </tr>
    


    </tr>
    <tr>
        <td>
    <a href="<?php echo base_url('admin/pemeriksaan') ?>" class="btn btn-success btn-xs"> Kembali</a></td>
    </tr>
</tbody>
</table>

