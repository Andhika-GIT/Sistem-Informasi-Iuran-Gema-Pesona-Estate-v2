<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: rgb(54,52,77);">
  <!-- style="background: linear-gradient(#FF9D6C, #BB4E75);" -->

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/dashboard'); ?>">
    <div class="sidebar-brand-icon ">
      <i class="fas fa-laptop-house"></i>
    </div>
    <div class="sidebar-brand-text mx-3">IURAN KAS </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item ">
    <a class="nav-link" href="<?= base_url('/dashboard'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <?php if (session()->get('role') == 'bendahara' or session()->get('role') == 'ketua-rt') { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
      Data Penduduk
    </div>

    <!-- Nav Item Data Penduduk -->
    <li class="nav-item">
      <a class="nav-link " href="<?= base_url('/datapenduduk'); ?>" d aria-expanded="true">
        <i class="nav-icon fas fa-users"></i>
        <span>Data Penduduk</span>
      </a>
    </li>
  <?php } ?>
  <?php if (session()->get('role') == 'bendahara' or session()->get('role') == 'ketua-rt' or session()->get('role') == 'warga') { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Iuran
    </div>

    <!-- Nav Item - Iuran -->
    <li class="nav-item">
      <a class="nav-link " href="<?= base_url('/iuranmasuk'); ?>" d aria-expanded="true">
        <i class="nav-icon fas fa-sign-in-alt"></i>
        <span>Iuran Masuk</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="<?= base_url('/iurankeluar'); ?>" d aria-expanded="true">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <span>Iuran Keluar</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="<?= base_url('/iurantunggakan'); ?>" d aria-expanded="true">
        <i class="nav-icon far fa-credit-card"></i>
        <span>Iuran Tunggakan</span>
      </a>
    </li>
  <?php } ?>


  <?php if (session()->get('role') == 'admin') { ?>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
      Pengaturan
    </div>

    <!-- Nav Item - Pengaturan akun -->
    <li class="nav-item">
      <a class="nav-link " href="<?= base_url('/kelolaakun'); ?>" d aria-expanded="true">
        <i class="nav-icon fas fa-users-cog"></i>
        <span>Kelola Akun User</span>
      </a>
    </li>

  <?php } ?>
  <!-- Divider -->
  <!-- Nav Item - Pengaturan akun -->
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link " href="<?= base_url('/pengaturanakun'); ?>" d aria-expanded="true">
      <i class="nav-icon fas fa-user-cog"></i>
      <span>Info Akun </span>
    </a>
  </li>

  <!-- Nav Item - Pengaturan akun -->
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link " href="<?= base_url('/thread'); ?>" d aria-expanded="true">
      <i class="nav-icon fas fa-comments"></i>
      <span>Thread </span>
    </a>
  </li>

  <hr class="sidebar-divider">

  <li class="nav-item active">
    <a onclick="return confirm('anda yakin ingin logout?')" class="nav-link" href="/auth/logout" d aria-expanded="true">
      <i class="nav-icon fas fa-user-cog"></i>
      <span>Log out</span>
    </a>
  </li>




</ul>
<!-- End of Sidebar -->