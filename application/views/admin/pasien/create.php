<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open(base_url('admin/pasien/create'), 'class="form-horizontal"');
?>

<!-- <div class="form-group">
    <label class="col-md-2 control-label">Id Pasien</label> 
    <div class="col-md-5">
        <input type="text" name="id_dokter" class="form-control" placeholder="id dokter" value="<?php echo set_value('id_dokter') ?>" required>
    </div>
</div> -->

<div class="form-group">
    <label class="col-md-2 control-label"> Kode Pasien</label> 
    <div class="col-md-5">
        <input type="text" name="kd_pasien" class="form-control" placeholder="Kode Pasien " value="<?= $kode_pasien ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nama Pasien</label> 
    <div class="col-md-5">
        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien " value="<?php echo set_value('nama_pasien') ?>" required>
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
    <label class="col-md-2 control-label">Tanggal Lahir</label> 
    <div class="col-md-5">
        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value=<?=date('Y-m-d')?> required>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label"> Golongan Darah </label> 
    <div class="col-md-5">
        <input type="text" name="goldar" class="form-control" placeholder="Golongan Darah " value="<?php echo set_value('goldar') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nomor Handphone </label> 
    <div class="col-md-5">
        <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone " value="<?php echo set_value('no_hp') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Pekerjaan </label> 
    <div class="col-md-5">
        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan " value="<?php echo set_value('pekerjaan') ?>" required>
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