<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open(base_url('admin/dokter/create'), 'class="form-horizontal"');
?>

<!-- <div class="form-group">
    <label class="col-md-2 control-label">Id Dokter</label> 
    <div class="col-md-5">
        <input type="text" name="id_dokter" class="form-control" placeholder="id dokter" value="<?php echo set_value('id_dokter') ?>" required>
    </div>
</div> -->

<div class="form-group">
    <label class="col-md-2 control-label"> NIP</label> 
    <div class="col-md-5">
        <input type="text" name="nip" class="form-control" placeholder="NIP " value="<?php echo set_value('nip') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nama Dokter</label> 
    <div class="col-md-5">
        <input type="text" name="nama_dokter" class="form-control" placeholder="Nama Dokter " value="<?php echo set_value('nama_dokter') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Jenis Kelamin </label> 
    <div class="col-md-5">
        <select name="jenis_kelamin" class="form-control">
            <option value="" disabled selected> -Pilih Jenis Kelamin- </option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Email </label> 
    <div class="col-md-5">
        <input type="text" name="email" class="form-control" placeholder="Email " value="<?php echo set_value('email') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nomor Telepon </label> 
    <div class="col-md-5">
        <input type="text" name="no_telp" class="form-control" placeholder="no_telp " value="<?php echo set_value('no_telp') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Alamat </label> 
    <div class="col-md-5">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat " value="<?php echo set_value('alamat') ?>" required>
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