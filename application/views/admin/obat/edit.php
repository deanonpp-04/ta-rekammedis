<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open(base_url('admin/obat/edit/'.$obat->id_obat), 'class="form-horizontal"');
?>
<div class="form-group">
    <div class="col-md-5">
        <input type="hidden" name="id_obat"  class="form-control" placeholder="id obat" >
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Kode obat</label> 
    <div class="col-md-5">
        <input type="text" name="kd_obat" class="form-control" placeholder="Kode Obat " value="<?php echo $obat->kd_obat?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nama obat</label> 
    <div class="col-md-5">
        <input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat " value="<?php echo $obat->nama_obat?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Harga </label> 
    <div class="col-md-5">
        <input type="text" name="harga" class="form-control" placeholder="Harga " value="<?php echo $obat->harga?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Satuan </label> 
    <div class="col-md-5">
        <input type="text" name="satuan" class="form-control" placeholder="Satuan " value="<?php echo $obat->satuan?>" required>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $obat->id_obat ?>">
        <i class="fa fa-edit"></i>Update
    </button>

<div class="modal fade" id="update-<?php echo $obat->id_obat ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA obat</h4>
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