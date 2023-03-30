<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel pb-5 d-flex" style="margin-top: 100px">


    </div>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="/" class="nav-link">
                    <p style="font-size: 18px; color: white">
                        <img src="{{asset ('/template/dist/img/QR.png') }}" alt="Logo"  >
                        Absen
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/logbook" class="nav-link" style="color: white">
                    {{-- <box-icon name='book-content' type='solid' ></box-icon> --}}
                    {{-- <i class="fa-solid fa-book"></i> --}}
                    <img src="{{asset ('/template/dist/img/BUKU.png') }}" alt="Logo"  >
                    Logbook
                </a>
            </li>
            <li class="nav-item">
                <a href="/perizinan" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Perizinan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/report" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Report dan sertifikat
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/dashboard" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/peserta" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Peserta
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/setting_magang" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Setting Magang
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/pembimbing" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Pembimbing
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/data_sekolah" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Data Sekolah
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/data_bidang" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Data Bidang
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/report" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Report
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/komponen_penilaian" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Komponen Penilaian
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/penilaian" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Penilaian
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/absensi" class="nav-link" style="color: white">
                    <p>
                        <img src="{{asset ('/template/dist/img/Library.png') }}" alt="Logo"  >
                        Absensi
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Absen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/table" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/data-table" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Table</p>
                </a>
              </li>
            </ul>
          </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
