<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open_multipart(base_url('admin/setting/edit/'.$setting->id_setting), 'class="form-horizontal"');
?>
<div class="form-group">
    <div class="col-md-5">
        <input type="hidden" name="id_setting"  class="form-control" placeholder="id setting" >
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nama Praktik</label> 
    <div class="col-md-5">
        <input type="text" name="nama_praktik" class="form-control" placeholder="Nama Praktik " value="<?php echo $setting->nama_praktik?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Logo </label> 
    <div class="col-md-5">
        <input type="file" name="logo" class="form-control" placeholder="Logo" >
    </div>
</div>


<!-- <div class="form-group">
    <label class="col-md-2 control-label"> Logo</label> 
    <div class="col-md-5">
        <input type="text" name="logo" class="form-control" placeholder="Logo " value="<?php echo $setting->logo?>" required>
    </div>
</div> -->

<div class="form-group">
    <label class="col-md-2 control-label"> Nomor Telepon</label> 
    <div class="col-md-5">
        <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon " value="<?php echo $setting->no_telp?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Email</label> 
    <div class="col-md-5">
        <input type="text" name="email" class="form-control" placeholder="Logo " value="<?php echo $setting->email?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Alamat </label> 
    <div class="col-md-5">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat " value="<?php echo $setting->alamat?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Keterangan </label> 
    <div class="col-md-5">
        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan " value="<?php echo $setting->keterangan?>" required>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $setting->id_setting ?>">
        <i class="fa fa-edit"></i>Update
    </button>

<div class="modal fade" id="update-<?php echo $setting->id_setting ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA SETTING</h4>
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