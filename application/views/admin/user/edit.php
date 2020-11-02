<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open_multipart(base_url('admin/user/edit/'.$user->id_user), 'class="form-horizontal"');
?>
<div class="form-group">
    <!-- <label class="col-md-2 control-label">ID user</label>  -->
    <div class="col-md-5">
        <input type="hidden" name="id_user"  class="form-control" placeholder="id user" >
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nama</label> 
    <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Nama " value="<?php echo $user->nama?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Email </label> 
    <div class="col-md-5">
        <input type="text" name="email" class="form-control" placeholder="Email " value="<?php echo $user->email?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Gambar </label> 
    <div class="col-md-5">
        <input type="file" name="gambar" class="form-control" >
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Username </label> 
    <div class="col-md-5">
        <input type="text" name="username" class="form-control" placeholder="Username " value="<?php echo $user->username?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Password </label> 
    <div class="col-md-5">
        <input type="password" name="password" class="form-control" placeholder="Password " value="<?php echo $user->password?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Level </label> 
    <div class="col-md-5">
        <input type="text" name="level" class="form-control" placeholder="Level " value="<?php echo $user->level?>" required>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $user->id_user ?>">
        <i class="fa fa-edit"></i>Update
    </button>

<div class="modal fade" id="update-<?php echo $user->id_user ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA User</h4>
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