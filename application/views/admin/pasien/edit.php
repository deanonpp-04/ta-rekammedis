<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open(base_url('admin/pasien/edit/'.$pasien->id_pasien), 'class="form-horizontal"');
?>
<div class="form-group">
    <div class="col-md-5">
        <input type="hidden" name="id_pasien"  class="form-control" placeholder="id pasien" >
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Kode Pasien</label> 
    <div class="col-md-5">
        <input type="text" name="kd_pasien" class="form-control" placeholder="Kode Pasien " value="<?php echo $pasien->kd_pasien?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nama Pasien</label> 
    <div class="col-md-5">
        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien " value="<?php echo $pasien->nama_pasien?>" required>
    </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Jenis Kelamin</label>
  <div class="col-md-5">
    <select name="jenis_kelamin" class="form-control">
      <option value="L">Laki-Laki</option>
      <option value="P" <?php if($pasien->jenis_kelamin=="P") {echo "selected";} ?>>Perempuan</option>
    </select>
  </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal Lahir</label> 
    <div class="col-md-5">
        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Keluar" value="<?php echo $pasien->tgl_lahir ?>" required>
    </div>
</div>

<!-- <div class="form-group">
    <label class="col-md-2 control-label"> Usia  </label> 
    <div class="col-md-5">
        <input type="text" name="usia" class="form-control" placeholder="Usia " value="<?php echo $pasien->usia?>" required>
    </div>
</div> -->

<div class="form-group">
    <label class="col-md-2 control-label"> Golongan Darah  </label> 
    <div class="col-md-5">
        <input type="text" name="goldar" class="form-control" placeholder="Golongan Darah " value="<?php echo $pasien->goldar?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nomor Handphone  </label> 
    <div class="col-md-5">
        <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone " value="<?php echo $pasien->no_hp?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Pekerjaan  </label> 
    <div class="col-md-5">
        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan " value="<?php echo $pasien->pekerjaan?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Alamat </label> 
    <div class="col-md-5">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat " value="<?php echo $pasien->alamat?>" required>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $pasien->id_pasien ?>">
        <i class="fa fa-edit"></i>Update
    </button>

<div class="modal fade" id="update-<?php echo $pasien->id_pasien ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA Pasien</h4>
        </div>
		<div class="modal-body">
			<div class="callout callout-warning">
				<h4>Peringatan!</h4>
					Yakin ingin mengubah data ini?
			</div>

        <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
        <input type="submit" class="btn btn-warning" name="submit" value="Ya">
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

    </div>
</div>
<!-- <div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
        <button class="btn btn-success btn-xm" name="submit" type="submit">
            <i class="fa fa-save"></i> Update
        </button>
    </div>
</div> -->
<?php echo form_close(); ?>