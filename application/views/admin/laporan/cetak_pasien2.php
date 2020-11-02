<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Rekam Medis </title>
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

            </td>
        
            </tr>
</table>
    <hr class="line-title">
        <center><p><span style="font-size: 30px;  font-weight: bold;">DATA REKAM MEDIS</span></p>
        </center><br><br>
<table>

<tr style="font-size: 20px; font-weight: bold">
	<td>Nama Pasien</td>
	<td>: <?= $nama_pasien->nama_pasien.' / '.$umur?></td>
</tr>

<tr style="font-size: 20px; font-weight: bold">
	<td>Golongan Darah</td>
	<td> : <?= $nama_pasien->goldar ?></td>
</tr>
</table>

    <br><br> 
    <table class="table1" border="1" width="100%" style="font-size: 22px;text-align:center;" cellspacing="0" >
    <tr>
                <th>No</th>
                <th>Tanggal Periksa</th>
                <th>Keluhan</th>
                <th>Penyakit</th> 
                <th>Tindakan</th>
                <th>Obat</th>
                <th>Biaya</th>            
    </tr>    
    <!-- <tbody> -->
    <?php $temp = []; ?>
                <?php 
                $no=1; 
                for($i = 0; $i < sizeof($datapasien) ; $i++) { ?>
                <tr>

                        <td  ><?=$no++ ?></td>
                        <td ><?php echo $datapasien[$i]['tgl_periksa']?></td>
                        <td ><?php echo $datapasien[$i]['keluhan'] ?></td>
                        <td ><?php echo $datapasien[$i]['nama_diagnosa'] ?></td>
                        <td ><?php echo $datapasien[$i]['nama_tindakan'] ?></td>
                        <td >
                            
                            <?php 
                            $num = 1;
                            for($j = 0 ; $j < sizeof($dataobat) ; $j++){
                                if($datapasien[$i]['tgl_periksa'] == $dataobat[$j]['tgl_periksa']){
                                    if($dataobat[$j]['nama_obat'] != NULL){
                                        echo $num++.'. '.$dataobat[$j]['nama_obat'].'<br>';
                                    }
                                }
                                
                            }
                            
                            ?>
                        </td>
                        <td ><?= format_rp($datapasien[$i]['total_biaya']) ?></td>
                    
                </tr>
                <?php 
                } ?>
            <!-- </tbody> -->
    </table>
    <table style="font-weight:bold;font-size:20px;" align="right">
        <tr><td><br><br><br><br><br><br></td>
            <td><?= $setting->alamat ?>, <br><br>Pemilik Praktik<br></td>
        </tr>
        <tr>
            <td><br><br><br><br><br><br><br><br></td>
            <td height="100">dr.Yolanda Prayetno Putri, Sp.THT-KL<br><br>NIP. 19590919 198003 2 005</td>            
</tr>
    </table>
<br><br><br><br><br><br><br><br><br><br><br>
</body></html>