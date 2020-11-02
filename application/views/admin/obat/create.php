<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open(base_url('admin/obat/create'), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label"> Kode Obat</label> 
    <div class="col-md-5">
        <input type="text" name="kd_obat" class="form-control" placeholder="Kode Obat" value="<?php echo set_value('kd_obat') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nama Obat</label> 
    <div class="col-md-5">
        <input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat " value="<?php echo set_value('nama_obat') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Harga </label> 
    <div class="col-md-5">
        <input type="text" name="harga" class="form-control" placeholder="Harga " value="<?php echo set_value('harga') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Satuan </label> 
    <div class="col-md-5">
        <input type="text" name="satuan" class="form-control" placeholder="Satuan " value="<?php echo set_value('satuan') ?>" required>
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