<div class="row">
	<div class="col-md-12 text-center">
		<td align="center">
				<span style="font-size: 25px; line-height: 1.3; font-weight: bold;">
					PRAKTIK <?= strtoupper($setting->nama_praktik) ?></span>
				<span style="font-size: 15px; line-height: 1.3;">
				<br>   <?= $setting->keterangan ?> </span>
				<hr size:="50px" >
		</td>
	</div>
<div>

<div class="row">
	<div class="col-md-2 text-center ">
		<!-- <h4>Grafik Jumlah Pasien/Hari</h4>
		<canvas id="myChart"></canvas> -->
	</div>

	<div class="col-md-8 text-center ">
		<h4>Grafik Jumlah Pasien/Hari</h4>
		<canvas id="myChart"></canvas>
	</div>

	<div class="col-md-2 text-center ">
		<!-- <h4>Grafik Jumlah Pasien/Hari</h4>
		<canvas id="myChart"></canvas> -->
	</div>
</div>
<div class="row">	
	<div class="col-md-2 text-center ">
		<!-- <h4>Grafik Jumlah Pasien/Hari</h4>
		<canvas id="myChart"></canvas> -->
	</div>

	<div class="col-md-8 text-center">
		<h4>Grafik Jumlah Pendapatan Per Bulan Tahun 2020</h4>
		<canvas id="myChartPendapatan"></canvas>
	</div>

	<div class="col-md-2 text-center ">
		<!-- <h4>Grafik Jumlah Pasien/Hari</h4>
		<canvas id="myChart"></canvas> -->
	</div>
</div>



<script type="text/javascript">
	var ctx = document.getElementById('myChart').getContext('2d');
	var ctx1 = document.getElementById('myChartPendapatan').getContext('2d');
	var chart = new Chart(ctx, {
	    // The type of chart we want to create
		type: 'bar',

	    // The data for our dataset
			data: {
				labels: [
				<?php foreach ($jum as $data): ?>
					<?= "'".$data['tanggal']."'," ?>
				<?php endforeach ?>
				],
				datasets: [{
					label: 'Jumlah Pasien',
					backgroundColor: 'rgb(60, 141, 188)',
					borderColor: 'rgb(60, 141, 188)',
					data: [
					<?php foreach ($jum as $data): ?>
						<?= "'".$data['jum']."'," ?>
					<?php endforeach ?>
					]
				}]
			},

	    // Configuration options go here
		options: {}
	});

	
	var chart1 = new Chart(ctx1, {
	    // The type of chart we want to create
		type: 'bar',

	    // The data for our dataset
			data: {
				labels: [
				<?php foreach ($pendapatan as $data): ?>
					<?= "'".$data['bulan']."'," ?>
				<?php endforeach ?>
				],
				datasets: [{
					label: 'Pendapatan',
					backgroundColor: 'rgb(60, 141, 188)',
					borderColor: 'rgb(60, 141, 188)',
					data: [
					<?php foreach ($pendapatan as $data): ?>
						<?= "'".$data['pendapatan']."'," ?>
					<?php endforeach ?>
					]
				}]
			},

			options: {
				animation: false,
				scales: {
				yAxes: [{
						ticks: {
							beginAtZero: true,
							callback: function(value, index, values) {
								if (parseInt(value) >= 1000) {
									return 'Rp' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
								} else {
									return 'Rp' + value;
								}
							}
						}
					}]
				},
				tooltips: {
					callbacks: {
						label: function(t, d) {
							var xLabel = d.datasets[t.datasetIndex].label;
							var yLabel = t.yLabel >= 1000 ?
								'Rp' + t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") :
								'Rp' + t.yLabel;
							return xLabel + ': ' + yLabel;
						}
					}
				}
			
			}
	});
</script>