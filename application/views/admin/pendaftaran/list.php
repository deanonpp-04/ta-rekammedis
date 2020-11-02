
<div class="row">
	<?php
	//Notifikasi
	if($this->session->flashdata('sukses')){
	    echo '<p class="alert alert-danger">';
	    echo $this->session->flashdata('sukses');
	}
	?>
	<div class="col-md-6 " >

		<h3 class="text-center">Pendaftaran</h3>

		<div class="row">
			<div class="col-md-12">


				<a href="<?= base_url('admin/pasien/create') ?>"><button class="btn btn-info" s> <i class="fa fa-plus"></i> Pasien Baru</button></a>
				
			</div>
			<br><br>
			<div class="col-md-12 text-right">
				<form method="post" action="<?= base_url('admin/pendaftaran/daftar') ?>">
					<select required=""  class="form-control selectpicker" data-live-search="true"  name="id_pasien">
						<option >--Pilih Data--</option>
							<?php foreach($pasien as $row){ 
								?>
								<option value="<?php echo $row->id_pasien?>" >
										<?php echo $row->nama_pasien ?>
								</option>
							
							
							<?php } ?>
					</select>

					<br><br>

					<button  class="btn btn-success btn-xm" name="submit" type="submit">
						<i class="fa fa-arrow-right"></i> Go
					</button>
					</form>
			</div>
		</div>
		<hr>
	</div>
	<div class="col-md-6">
		<h3 class="text-center">Antrian</h3>
		<table class="table table-bordered" id="mydata">
				<thead>
					<tr>
						<th class="text-center">No Antrian</th>
						<th class="text-center">Nama Pasien</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($antrian as $row) { ?>
						<?php if ($row->status_pendaftaran == "ongoing"): ?>
							<tr>
								<td><?php echo $row->nomor ?></td>
								<td><?php echo $row->nama_pasien ?></td>
								<td><a target="_blank" href="<?= base_url('admin/pendaftaran/cetak/'.$row->nomor.'/'.$row->id_pasien) ?>"><button class="btn btn-info" >Cetak</button></a></td>
							</tr>

						<?php endif ?>
					
					<?php } ?>
				
				
		</tbody>
		</table> 
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<h3 class="text-center">Riwayat Pemeriksaan Hari Ini</h3>
		<table class="table table-bordered" id="example1">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama Pasien</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach($pemeriksaan as $key => $row) { ?>
						<?php if ($row->status == "ongoing" || $row->status == "done" ): ?>
							
							<tr>
								<td><?php echo $key + 1;?></td>
								<td><?php echo $row->nama_pasien ?></td>
							</tr>

						<?php endif ?>
					
					<?php } ?>
				
				</tbody>
		</table> 
	</div> 
</div>

