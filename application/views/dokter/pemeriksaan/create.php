<?php
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open(base_url('dokter/pemeriksaan/create'), 'class="form-horizontal"');
?>
<!-- <div class="form-group">
    <label class="col-md-2 control-label">Tanggal Periksa  </label> 
    <div class="col-md-5">
    <input type="date" name="tgl_periksa" class="form-control" placeholder="tgl_periksa" value=<?=date('Y-m-d H:i:s ') ?> required>
    </div>
</div> -->
<div class="form-group">
    <label class="col-md-2 control-label text-right">Nama Pasien</label>
        <div class="col-md-5">
            
            <select  class="form-control selectpicker" data-live-search="true"  name="id_pasien">
            <option >--Pilih Data--</option>
            <?php foreach($pasien as $pasien){ 
                $this->db->select('*');
                //$this->db->from('tbl_anggota');
                $db = $this->db->get_where('pasien', array('id_pasien'=>$id_pasien))->row();
                
                ?>
                    
                <option value="<?php echo $pasien->id_pasien.'-'.$pasien->id_antrian?>">
                <?php echo $pasien->nama_pasien ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
    <label class="col-md-2 control-label text-right">Nama Dokter</label>
    <div class="col-md-5">
            <select name="id_dokter"  class="form-control selectpicker" data-live-search="true" >
            <option>--Pilih Data--</option>
            <?php foreach($dokter as $dokter){ 
                $this->db->select('*');
                //$this->db->from('tbl_anggota');
                $db = $this->db->get_where('dokter', array('id_dokter'=>$id_dokter))->row();
                
                if($dokter->id_dokter == $id_dokter){?>
                    <option value="<?php echo $db->id_dokter?>" selected>
                            <?php echo $db->nama_dokter ?>
            </option>
            
            <?php }else{ ?>
                <option value="<?php echo $dokter->id_dokter?>">
                <?php echo $dokter->nama_dokter ?>
            <?php }
        } ?>
            </select>
        </div>
    </div>

<div class="form-group">
    <label class="col-md-2 control-label">Keluhan</label> 
    <div class="col-md-5">
        <input type="text" name="keluhan" class="form-control" placeholder="Silahkan masukkan keluhan pasien" value="<?php echo set_value('keluhan') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label text-right">Nama Penyakit</label>
        <div class="col-md-5">
            <select name="id_diagnosa"  class="form-control selectpicker" data-live-search="true" >
                <option>--Pilih Data--</option>
                <?php foreach($diagnosa as $diagnosa){ 
                    $this->db->select('*');
                    $db = $this->db->get_where('diagnosa', array('id_diagnosa'=>$id_diagnosa))->row();
                    
                    if($diagnosa->id_diagnosa == $id_diagnosa){?>
                        <option value="<?php echo $db->id_diagnosa?>" selected>
                                <?php echo $db->nama_diagnosa ?>
                </option>
                
                <?php }else{ ?>
                    <option value="<?php echo $diagnosa->id_diagnosa?>">
                                <?php echo $diagnosa->nama_diagnosa ?>
                <?php }
        } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
    <label class="col-md-2 control-label"> Nama Tindakan  </label> 
    <div class="col-md-5">
        <input type="text" name="nama_tindakan" class="form-control" placeholder="Silahkan masukkan tindakan kepada pasien " value="<?php echo set_value('nama_tindakan') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label text-right">Nama Obat</label>
        <div class="col-md-5">
            
            <select id="obat" name="obat[]" class="form-control" multiple="multiple">
            <option>--Pilih Data--</option>
            <?php foreach($obat as $obat){ 
                $this->db->select('*');
                $db = $this->db->get_where('obat', array('id_obat'=>$id_obat))->row();
                
                if($obat->id_obat == $id_obat){?>
                    <option value="<?php echo $db->id_obat?>" selected>
                            <?php echo $db->nama_obat ?>
            </option>
            
            <?php }else{ ?>
                <option value="<?php echo $obat->id_obat?>">
                            <?php echo $obat->nama_obat ?>
            <?php }
        } ?>
            </select>
        </div>
    </div>

<div class="form-group">
    <label class="col-md-2 control-label"> Biaya Periksa  </label> 
    <div class="col-md-5">
        <input type="text" name="biaya_periksa" class="form-control" placeholder="Silahkan masukkan biaya pemeriksaan " value="<?php echo set_value('biaya_periksa') ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Keterangan</label> 
    <div class="col-md-5">
        <input type="text" name="keterangan" class="form-control" placeholder="Silahkan masukkan keterangan tambahan" value="<?php echo set_value('keterangan') ?>" required>
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