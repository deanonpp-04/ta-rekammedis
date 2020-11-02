  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>
        <!-- menu dasbord -->
              <li><a href="<?php echo base_url('dokter/dasbor') ?>"><i class="fa fa-pie-chart"  style="font-size:20px"></i> <span>Dashboard</span></a></li>
              <li><a href="<?php echo base_url('dokter/pasien') ?>">  <i class="fa fa-group" style="font-size:18px"></i> <span> Data Pasien</span></a></li>
              <li><a href="<?php echo base_url('dokter/pemeriksaan') ?>">  <i class="fa fa-stethoscope" style="font-size:20px"></i> <span>Data Pemeriksaan</span></a></li> 
              <li><a href="<?php echo base_url('dokter/rekam_medis') ?>">  <i class="fa fa-wpforms" style="font-size:20px"></i> <span>Data Rekam Medis</span></a></li>
              <!-- <li><a href="<?php echo base_url('admin/antrian') ?>">  <i class="fa fa-hourglass-1" style="font-size:20px"></i> <span>Data Antrian</span></a></li> -->
              

              <li class="treeview">
              <a href="#">
                <i class="fa fa-save" style="font-size:20px"></i> <span>Data Laporan</span>
                  <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a> 
              <ul class="treeview-menu">
              
              <li><a href="<?php echo base_url('dokter/laporan_pasien') ?>"><i class="fa fa-file-text"></i> Laporan Pasien</a></li>
              <li><a href="<?php echo base_url('dokter/laporan_pemeriksaan') ?>"><i class="fa fa-file-text"></i> Laporan Pemeriksaan</a></li>
              <li><a href="<?php echo base_url('dokter/laporan_pendapatan') ?>"><i class="fa fa-file-text"></i> Laporan Pendapatan</a></li>  
              <!-- <li><a href="<?php echo base_url('dokter/laporan') ?>"><i class="fa fa-file-text-o"></i> Laporan Rekam Medis</a></li> -->
              </ul>
            </li>
      </ul>
      </section>
      <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="margin-top: 15px">
        <?php  echo $title?>
      </h1>
      <ol class="breadcrumb">
        <h4><?= 'Tanggal '.date('d-m-Y') ?></h4>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">