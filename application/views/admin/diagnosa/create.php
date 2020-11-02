<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open(base_url('admin/diagnosa/create'), 'class="form-horizontal"');
?>

<!-- <div class="form-group">
    <label class="col-md-2 control-label">Id Praktik</label> 
    <div class="col-md-5">
        <input type="text" name="id_praktik" class="form-control" placeholder="id praktik" value="<?php echo set_value('id_praktik') ?>" required>
    </div>
</div> -->

<div class="form-group">
    <label class="col-md-2 control-label"> Kode Diagnosa</label> 
    <div class="col-md-5">
        <input type="text" name="kd_diagnosa" class="form-control" placeholder="Kode Diagnosa" value="<?php echo set_value('kd_diagnosa') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nama Diagnosa</label> 
    <div class="col-md-5">
        <input type="text" name="nama_diagnosa" class="form-control" placeholder="Nama Diagnosa " value="<?php echo set_value('nama_diagnosa') ?>" required>
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