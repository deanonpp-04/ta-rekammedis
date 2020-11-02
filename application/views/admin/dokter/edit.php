<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open(base_url('admin/dokter/edit/'.$dokter->id_dokter), 'class="form-horizontal"');
?>
<div class="form-group">
    <!-- <label class="col-md-2 control-label">ID Dokter</label>  -->
    <div class="col-md-5">
        <input type="hidden" name="id_dokter"  class="form-control" placeholder="id dokter" >
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> NIP</label> 
    <div class="col-md-5">
        <input type="text" name="nip" class="form-control" placeholder="NIP " value="<?php echo $dokter->nip?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nama Dokter</label> 
    <div class="col-md-5">
        <input type="text" name="nama_dokter" class="form-control" placeholder="Nama Dokter " value="<?php echo $dokter->nama_dokter?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Jenis Kelamin</label>
    <div class="col-md-5">
        <select name="jenis_kelamin" class="form-control">
        <option value="L">Laki-Laki</option>
        <option value="P" <?php if($dokter->jenis_kelamin=="P") {echo "selected";} ?>>Perempuan</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Email </label> 
    <div class="col-md-5">
        <input type="text" name="email" class="form-control" placeholder="Email " value="<?php echo $dokter->email?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nomor Telepon </label> 
    <div class="col-md-5">
        <input type="text" name="no_telp" class="form-control" placeholder="Email " value="<?php echo $dokter->no_telp?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Alamat </label> 
    <div class="col-md-5">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat " value="<?php echo $dokter->alamat?>" required>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $dokter->id_dokter ?>">
        <i class="fa fa-edit"></i>Update
 </button>

 <div class="modal fade" id="update-<?php echo $dokter->id_dokter ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA Dokter</h4>
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