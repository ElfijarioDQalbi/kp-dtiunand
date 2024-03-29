<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
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
          <li class="nav-header">BERANDA</li>
          <li class="nav-item menu">
            <a href="{{ route('beranda-dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">KELOLA</li>
          <li class="nav-item menu">
            <a href="{{ route('indexmahasiswa') }}" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Mahasiswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" aria-selected="false">
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
            <li class="nav-item menu">
              <a href="{{ route('riwayat.wa') }}" class="nav-link">
                <i class="nav-icon fas fa-history"></i>
                <p>
                  Riwayat Pesan
                </p>
              </a>
            </li>
          </li>
          <li class="nav-header">ADMIN</li>
          <li class="nav-item">
            <a href="/register" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Akun
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
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

  {{-- <script>
    const links = document.querySelectorAll('.nav-link');

    if(links.length){
      links.forEach((link) = > {
        link.addEventListener('click', (e) => {
          links.forEach((link) => {
            link.classList.remove('active');
          });
          e.preventDefault();
          link.classList.add('active');
        });
      });
    }

  </script>

  .nav-link.active {
    color:white;
  } --}}
