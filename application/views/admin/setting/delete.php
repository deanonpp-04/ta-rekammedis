<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $setting->id_setting ?>">
        <i class="fa fa-trash-o"></i>Hapus
 </button>

 <div class="modal fade" id="delete-<?php echo $setting->id_setting ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">HAPUS DATA SETTING</h4>
        </div>
        <div class="modal-body">
            <div class="callout callout-warning">
                <h4>Peringatan!</h4>
                    Yakin ingin mengahapus data ini? data yang sudah dihapus tidak dapat dikembalikan
            </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Tidak</button>
        <a href="<?php echo base_url('admin/setting/delete/'.$setting->id_setting) ?>" class="btn btn-danger "><i class="fa fa-trash-o"></i>Ya</a>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->