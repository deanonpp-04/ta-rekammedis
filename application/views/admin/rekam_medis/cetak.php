<!DOCTYPE html>
<?php
ob_start();
?>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Rekam Medis</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>
</head><body>
<!-- <img src="assets/upload/logo/bakti.png"style="position: absolute; width: 90px; height: auto;"> -->
  <table style="width: 100%;">
    <tr>
    <!-- <td width="30%" align="center"><img src="assets/upload/logo/logo1.png"style="position: absolute; width: 10em; height:10em; "></td> -->
    <td width="30%" align="center"><img src="<?= base_url('assets/upload/logo/'.$setting->logo) ?>"></td>
        <td align="center">
            <span style="font-size: 25px; line-height: 1.3; font-weight: bold;">
                PRAKTIK <?= strtoupper($setting->nama_praktik) ?></span>
            <span style="font-size: 20px; line-height: 1.3;">
              <br>   <?= $setting->keterangan ?> </span>
            <span style="font-size: 15px; line-height: 1.3;">
              <br>Email: <?= $setting->email ?></span>
            <span style="font-size: 15px; line-height: 1.3;">
              <br>Telp: <?= $setting->no_telp ?></span>
          </td>
          <td>
          <!-- <img src="<?= base_url('assets/upload/logo/'.$setting->logo) ?>"> -->
          </td>
         
        </tr>
  </table>

  <hr class="line-title">
      <center><p><span style="font-size: 16px;  font-weight: bold;">DATA REKAM MEDIS</span></p>
      </center><br><br>
<table>
<tr style="font-size: 14px; font-weight: bold">
	<td>Nama Pasien</td>
	<td>: <?= $nama_pasien->nama_pasien.' / '.$umur?></td>
</tr>
<tr style="font-size: 14px; font-weight: bold">
	<td>Golongan Darah</td>
	<td> : <?= $nama_pasien->goldar ?></td>
</tr>
</table>
<br><br> 
    <table class="table table-bordered" border="1" width="100%">
    <tr>
                    <th>No</t>
                    <th>Tanggal Periksa</th>
                    <th>Keluhan</th>
                    <th>Periksa</th>
                    <th>Tindakan</th>
                    <th>Obat</th>
                    <th>Biaya</th>

                
    </tr>
    <tbody>
    <?php $temp = null; ?>
                <?php 
                $no=1; 
                for($i = 0; $i < sizeof($rekam_medis) ; $i++) { ?>
                <tr>
                    <?php if ($rekam_medis[$i]['id_periksa'] != $temp): ?>
                      
                        <td  ><?=$no++ ?></td>
                        <td ><?php echo $rekam_medis[$i]['tgl_periksa']?></td>
                        <td ><?php echo $rekam_medis[$i]['keluhan'] ?></td>
                        <td > <?php echo $rekam_medis[$i]['nama_diagnosa'] ?></td>
                        <td ><?php echo $rekam_medis[$i]['nama_tindakan'] ?></td>
                        <td >
                            
                            <?php 
                            $num = 1;
                            for($j = 0 ; $j < sizeof($rekam_medis) ; $j++){
                                if ($rekam_medis[$j]['id_periksa'] == $rekam_medis[$i]['id_periksa'] ) {
                                    echo $num++.'. '.$rekam_medis[$j]['nama_obat'].'<br>';
                                }
                                
                            }
                            
                            ?>
                        </td>
                        <td ><?= format_rp($rekam_medis[$i]['total_biaya']) ?></td>
                    <?php endif ?>
                    <?php $temp = $rekam_medis[$i]['id_periksa'] ?>
                </tr>
                <?php 
                } ?>
            </tbody>
        </table> 
    </div>

    </table>
    <table style="font-weight: bold;" align="right">
          <tr><td><br><br><br><br><br><br></td>
            <td>Padang, <br><br>Pemilik Praktik<br></td>
          </tr>
          <tr>
            <td><br><br><br><br><br><br><br><br></td>
            <td height="100">dr.Yolanda Prayetno Putri, Sp.THT-KL<br><br>NIP. 19590919 198003 2 005</td>
            
          </tr>
    </table>
<br><br><br><br><br><br><br><br><br><br><br>
</body></html>