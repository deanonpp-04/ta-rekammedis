<!DOCTYPE html>
<html><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan pemeriksaan</title>
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

  <table style="width: 100%;">
    <tr>
    <td width="30%" align="center"><img src="<?= base_url('assets/upload/logo/'.$setting->logo) ?>"></td>
        <td align="center">
            <span style="font-size: 35px; line-height: 1.3; font-weight: bold;">
                PRAKTIK <?= strtoupper($setting->nama_praktik) ?></span>
            <span style="font-size: 25px; line-height: 1.3;">
              <br>   <?= $setting->keterangan ?> </span>
            <span style="font-size: 25px; line-height: 1.3;">
              <br>Email: <?= $setting->email ?></span>
            <span style="font-size: 25px; line-height: 1.3;">
              <br>Telp: <?= $setting->no_telp ?></span>
          </td>
      <td>
    </tr>
  </table><br>

  <hr class="line-title">
      <center><p><span style="font-size: 30px;  font-weight: bold;">LAPORAN PEMERIKSAAN PASIEN</span></p>
      </center><br><br>
<table>
<tr style="font-size: 25px; font-weight: bold">
    <td>Bulan</td>
    <td> : </td>
    <td>
    <?php
    if($bulan == "1") echo "Januari";
    if($bulan == "2") echo "Februari";
    if($bulan == "3") echo "Maret";
    if($bulan == "4") echo "April";
    if($bulan == "5") echo "Mei";
    if($bulan == "6") echo "Juni";
    if($bulan == "7") echo "Juli";
    if($bulan == "8") echo "Agustus";
    if($bulan == "9") echo "September";
    if($bulan == "10") echo "Oktober";
    if($bulan == "11") echo "November";
    if($bulan == "12") echo "Desember";
    ?>
    <td>
</tr>
</tr>
<tr style="font-size: 25px; font-weight: bold">
  <td>Tahun</td>
  <td>:</td>
  <td> <?php echo ($tahun);?></td>
</tr>
</table>
<br><br>

<table class="table1" border="1" width="100%" style="font-size: 22px;text-align:center;" cellspacing="0" >
    <tr>

                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Keluhan</th>
                <th>Tindakan</th>
                <th>Keterangan</th>
                <th>Biaya Periksa</th>
                
    </tr>
  <?php 
  $total = 0;
  foreach($detail as $key => $result):?>
    <tr>

                <td><?php echo $key +1;?></td>
                <td><?php echo date('d F Y',strtotime($result['tgl_periksa']));?></td>
                <td><?php echo $result['nama_pasien'];?></td> 
                <td><?php echo $result['nama_dokter'];?></td> 
                <td><?php echo $result['keluhan'];?></td>
                <td><?php echo $result['nama_tindakan'];?></td>
                <td><?php echo $result['keterangan'];?></td>   
                <td><?php echo format_rp($result['total_biaya']) ;?></td>
                
                                
	</tr>
            <?php endforeach;?>
            
  

  </table>
    <table style="font-weight: bold;font-size :23px;" align="right">
          <tr><td><br><br><br><br><br><br></td>
            <td><?= $setting->alamat ?>,<br><br>Pemilik Praktik<br></td>
          </tr>
          <tr>
            <td><br><br><br><br><br><br><br><br></td>
            <td height="100">dr.Yolanda Prayetno Putri, Sp.THT-KL<br><br>NIP. 19590919 198003 2 005</td>
            
          </tr>
    </table>
  </table>
<br><br><br><br><br><br><br><br><br><br><br>
</body></html>