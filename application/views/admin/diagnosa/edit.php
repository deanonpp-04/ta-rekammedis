<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open(base_url('admin/diagnosa/edit/'.$diagnosa->id_diagnosa), 'class="form-horizontal"');
?>
<div class="form-group">
    <div class="col-md-5">
        <input type="hidden" name="id_diagnosa"  class="form-control" placeholder="id diagnosa" >
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Kode Diagnosa</label> 
    <div class="col-md-5">
        <input type="text" name="kd_diagnosa" class="form-control" placeholder="Kode Diagnosa " value="<?php echo $diagnosa->kd_diagnosa?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nama Diagnosa</label> 
    <div class="col-md-5">
        <input type="text" name="nama_diagnosa" class="form-control" placeholder="Nama Diagnosa " value="<?php echo $diagnosa->nama_diagnosa?>" required>
    </div>
</div>



<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $diagnosa->id_diagnosa ?>">
        <i class="fa fa-edit"></i>Update
    </button>

<div class="modal fade" id="update-<?php echo $diagnosa->id_diagnosa ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA Diagnosa</h4>
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