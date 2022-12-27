<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/beranda" class="brand-link">
      <img src="assets/dist/img/LogoUnand.png" alt="Unand Logo" class="brand-image img-circle elevation-3" style="opacity: .9">
      <span class="brand-text font-weight-light">Universitas Andalas</span>
    </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">PENDATAAN</li>
          <li class="nav-item menu">
            <a href="/mahasiswa" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Mahasiswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/laporan" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Pesan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/kirimpesan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kirim Pesan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/riwayatpesan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Pesan</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Pesan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item col-sm-4" >
                <a href="/pesan" class="nav-link">
                  <i class="nav-icon fab fa-whatsapp"></i>
                  <p>
                    WhatsApp
                  </p>
                </a>
              </li>
              <li class="nav-item col-sm-4">
                <a href="/email" class="nav-link">
                  <i class="nav-icon fas fa-mail-bulk"></i>
                  <p>
                    Email
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">ADMIN</li>
          <li class="nav-item">
            <a href="/akun" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Akun
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->