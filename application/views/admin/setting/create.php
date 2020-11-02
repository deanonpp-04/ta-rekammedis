<?php
if (isset($error)){
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';

}
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open_multipart(base_url('admin/setting/create'), 'class="form-horizontal"');
?>
<div class="form-group">
    <label class="col-md-2 control-label">Nama Praktik</label> 
    <div class="col-md-5">
        <input type="text" name="nama_praktik" class="form-control" placeholder="Nama Praktik " value="<?php echo set_value('nama_praktik') ?>"  required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Logo </label> 
    <div class="col-md-5">
        <input type="file" name="logo" required="required">
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Nomor Telepon</label> 
    <div class="col-md-5">
        <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon" value="<?php echo set_value('no_telp') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Email</label> 
    <div class="col-md-5">
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Alamat</label> 
    <div class="col-md-5">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Keterangan</label> 
    <div class="col-md-5">
        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo set_value('keterangan') ?>" required>
    </div>
</div>




<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
        <button class="btn btn-success btn-xm" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
        <button class="btn btn-info btn-xm" name="reset" type="reset">
            <i class="fa fa-times"></i> Reset
        </button>
    </div>
</div>
<?php echo form_close(); ?>