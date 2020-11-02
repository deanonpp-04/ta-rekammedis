<!DOCTYPE html>
<html>
<head>
	<title>Bukti Pendaftaran</title>
</head>
<body >

	<table border="2" >
		<tr>
			<td>
			
				<center>
					<span style="font-size: 15px; line-height: 1.3; font-weight: bold;">
						PRAKTIK <?= strtoupper($setting->nama_praktik) ?></span>
					<span style="font-size: 10px; line-height: 1.3;">
						<br> <?= $setting->keterangan ?></span>
					<span style="font-size: 10px; line-height: 1.3;">
						<br>   <?= $setting->alamat ?> </span>
					<span style="font-size: 10px; line-height: 1.3;">
						<br>Telp: <?= $setting->no_telp ?></span>
						<hr size:="50px" >
					<h2>No <?= $no_antrian ?></h2>
					<label>Nama Pasien : <?=  $pasien->nama_pasien?></label><br>
					<label>Tanggal : <?= date('d-m-Y') ?></label><br><br>
				</center>
			</td>
		</tr>
	</table>
	
</body>
</html>
<script>
		window.print();
	</script>