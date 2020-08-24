  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>admin/identifikasi/Cek">
        <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-calendar-check"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KDN BISA &nbsp<sup style="color: yellow;">v.1</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>admin/auth/Dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li> -->


       <!-- Divider -->
       <!-- <hr class="sidebar-divider"> -->
       <!-- Nav Item - Permendagri -->
       <!-- <div class="sidebar-heading">
        Identifikasi
      </div> -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>admin/identifikasi/cek">
          <i class="fas fa-home"></i>
          <span>Menu Utama</span></a>
        </li>

      <!-- Nav Item - Utilities Collapse Menu -->
    <!--   <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Perencanaan
      </div>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>admin/identifikasi/Perencanaan">
         <i class="fas fa-map-marked-alt"></i>
          <span>Perencanaan </span></a>
        </li>   
      <!-- Divider -->
      <hr class="sidebar-divider">   
            
      <?php if ($this->session->role == 'root') { ?>
      <div class="sidebar-heading">
        Pengaturan
      </div>
      <?php } ?>


    
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>admin/identifikasi/Produk_daerah">
          <i class="fas fa-file"></i>
          <span>Daftar Produk Hukum</span></a>
      </li>



    

      <!-- Nav Item - Pages Collapse Menu -->
       <?php if ($this->session->role == 'root') { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-cogs"></i>
          <span>Data Master</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Master :</h6>
            <a class="collapse-item" href="<?= base_url() ?>admin/master/Produk">Kategori Produk Hukum <br/>Daerah</a>
            <a class="collapse-item" href="<?= base_url() ?>admin/master/Urusan">Kategori Urusan</a>

            <!-- <a class="collapse-item" href="forgot-password.html">Forgot Password</a> -->
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Data User</h6>
            <a class="collapse-item" href="<?= base_url() ?>admin/master/User">Data User</a> 
          </div>
        </div>
      </li>
   


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <?php } ?>
        

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>