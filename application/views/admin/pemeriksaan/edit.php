<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open(base_url('admin/pemeriksaan/edit/' .$pemeriksaan->id_periksa), 'class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Tanggal Periksa </label> 
    <div class="col-md-5">
        <input type="text" name="tgl_periksa" class="form-control" placeholder="Tanggal Periksa " value="<?php echo $pemeriksaan->tgl_periksa?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label text-right">Nama Pasien</label>
        <div class="col-md-5">
            <select name="id_pasien" class="form-control" >
            
            <?php foreach($pasien as $pasien){ 
                // $this->db->select('*');
                //$this->db->from('tbl_anggota');
                // $db = $this->db->get_where('diagnosa', array('id_diagnosa'=>$id_diagnosa))->row();
                
                // if($diagnosa->id_diagnosa == $id_diagnosa){?>
                    <option value="<?php echo $pasien->id_pasien?>" <?php if($pemeriksaan->id_pasien==$pasien->id_pasien) { echo "selected"; } ?>>
                            <?php echo $pasien->nama_pasien ?>
            </option>
            
            <?php }?>
        
            </select>
        </div>
    </div>

    <div class="form-group">
    <label class="col-md-2 control-label text-right">Nama Dokter</label>
        <div class="col-md-5">
            <select name="id_dokter" class="form-control" >
            
            <?php foreach($dokter as $dokter){ 
                // $this->db->select('*');
                //$this->db->from('tbl_anggota');
                // $db = $this->db->get_where('diagnosa', array('id_diagnosa'=>$id_diagnosa))->row();
                
                // if($diagnosa->id_diagnosa == $id_diagnosa){?>
                    <option value="<?php echo $dokter->id_dokter?>" <?php if($pemeriksaan->id_dokter==$dokter->id_dokter) { echo "selected"; } ?>>
                            <?php echo $dokter->nama_dokter ?>
            </option>
            
            <?php }?>
        
            </select>
        </div>
    </div>

<div class="form-group">
    <label class="col-md-2 control-label">Keluhan</label> 
    <div class="col-md-5">
        <input type="text" name="keluhan" class="form-control" placeholder="Keluhan" value="<?php echo $pemeriksaan->keluhan ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label text-right">Penyakit</label>
        <div class="col-md-5">
            <select name="id_diagnosa" class="form-control" >
            
            <?php foreach($diagnosa as $diagnosa){ 
                // $this->db->select('*');
                //$this->db->from('tbl_anggota');
                // $db = $this->db->get_where('diagnosa', array('id_diagnosa'=>$id_diagnosa))->row();
                
                // if($diagnosa->id_diagnosa == $id_diagnosa){?>
                    <option value="<?php echo $diagnosa->id_diagnosa?>" <?php if($pemeriksaan->id_diagnosa==$diagnosa->id_diagnosa) { echo "selected"; } ?>>
                            <?php echo $diagnosa->nama_diagnosa ?>
            </option>
            
            <?php }?>
        
            </select>
        </div>
    </div>

    <div class="form-group">
    <label class="col-md-2 control-label text-right">Nama Obat </label>
        <div class="col-md-5">
             <select name="obat[]" class="form-control" multiple="" id="obat" >
            
            <?php 
            $obat_array = [];

            $i=0;
            foreach ($obat_pemeriksaan as $row) {
                $obat_array[$i] = $row->id_obat;
                $i++;
            }

            foreach($obat as $obat){    
            ?>

            <?php if( array_search($obat->id_obat, $obat_array) !== false ): ?>
                <option selected value="<?= $obat->id_obat ?>"><?= $obat->nama_obat ?></option>
            <?php else: ?>
                <option value="<?= $obat->id_obat ?>"><?= $obat->nama_obat ?></option>
            <?php endif ?>
            
            
        
            <?php } ?>
        
            </select>
        </div>
    </div>

    
<div class="form-group">
    <label class="col-md-2 control-label"> Nama Tindakan </label> 
    <div class="col-md-5">
        <input type="text" name="nama_tindakan" class="form-control" placeholder="Nama Tindakan " value="<?php echo $pemeriksaan->nama_tindakan ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Biaya Periksa  </label> 
    <div class="col-md-5">
        <input type="text" name="biaya_periksa" class="form-control" placeholder="Biaya Periksa " value="<?php echo $pemeriksaan->biaya_periksa ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Keterangan</label> 
    <div class="col-md-5">
        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo $pemeriksaan->keterangan ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">

    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $pemeriksaan->id_periksa ?>">
        <i class="fa fa-edit"></i>Update
    </button>

<div class="modal fade" id="update-<?php echo $pemeriksaan->id_periksa ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA Pemeriksaan</h4>
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
<?php echo form_close(); ?>