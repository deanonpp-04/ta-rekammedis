<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>assets/admin/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <img src="<?= base_url('assets/upload/logo/'.$setting->logo) ?>">
        <b><?= $setting->nama_praktik ?></b>
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <!--  <img src="<?php echo base_url() ?>assets/upload/gambar/Dea Annona Prayetno Putri.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <!--  <img src="<?php echo base_url() ?>assets/upload/gambar/Dea Annona Prayetno Putri.jpg" class="img-circle" alt="User Image">
 -->
                <p>
                  <?php echo $this->session->userdata('username'); ?> - <?php echo $this->session->userdata('level'); ?><small><?php echo date('d M Y') ?></small>
                </p>
              </li>
              
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="<?php echo base_url('admin/user') ?>" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="<?php echo base_url('login/logout') ?>" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>