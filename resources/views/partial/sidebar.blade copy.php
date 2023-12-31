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
            @if (Str::length(Auth::guard('admin')->user()) > 0)
            <li class="nav-item">
                <a href="/dashboard" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/dashboard.png') }}" alt="Logo"  > --}}
                        <i class='bx bxs-dashboard' style="vertical-align: -3px;font-size: 25px" ></i>
                        Dashboard
                    </p>
                </a>
            </li>
            <!-- admin -->
            <li class="nav-item">
                <a href="/peserta" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Peserta.png') }}" alt="Logo"  > --}}
                        <i class='bx bx-child' style="vertical-align: -3px;font-size: 25px"></i>
                        Peserta
                    </p>
                </a>
            </li>
            <!-- admin -->
            <li class="nav-item">
                <a href="/setting_magang" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Setting.png') }}" alt="Logo"  > --}}
                        <i class='bx bxs-cog' style="vertical-align: -3px;font-size: 25px" ></i>
                        Setting Magang
                    </p>
                </a>
            </li>
            <!-- admin -->
            <li class="nav-item">
                <a href="/pembimbing" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Pembimbing.png') }}" alt="Logo"  > --}}
                        <i class='bx bx-male'style="vertical-align: -3px;font-size: 25px" ></i>
                        Pembimbing
                    </p>
                </a>
            </li>
            <!-- admin -->
            <li class="nav-item">
                <a href="/data_sekolah" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Sekolah.png') }}" alt="Logo"  > --}}
                        <i class='bx bxs-school'style="vertical-align: -3px;font-size: 25px" ></i>
                        Data Sekolah
                    </p>
                </a>
            </li>
            <!-- admin -->
            <li class="nav-item">
                <a href="/data_bidang" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Bidang.png') }}" alt="Logo"  > --}}
                        <i class='bx bxs-objects-horizontal-left' style="vertical-align: -3px;font-size: 25px"></i>
                        Data Bidang
                    </p>
                </a>
            </li>
            <!-- admin -->
            <li class="nav-item">
                <a href="/report" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Grafik.png') }}" alt="Logo"  > --}}
                        <i class='bx bxs-book-open'style="vertical-align: -3px;font-size: 25px" ></i>
                        Report
                    </p>
                </a>
            </li>
            <!-- admin -->
            <li class="nav-item">
                <a href="/komponen_penilaian" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Komponen.png') }}" alt="Logo"  > --}}
                        <i class='bx bx-book-alt' style="vertical-align: -3px;font-size: 25px" ></i>
                        Komponen Penilaian
                    </p>
                </a>
            </li>
            <!-- admin -->
            <li class="nav-item">
                <a href="/penilaian" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Nilai.png') }}" alt="Logo"  > --}}
                        <i class='bx bx-book-bookmark' style="vertical-align: -3px;font-size: 25px"></i>
                        Penilaian
                    </p>
                </a>
            </li>
            <!-- admin -->
            <li class="nav-item">
                <a href="/absensi" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Absen.png') }}" alt="Logo"  > --}}
                        <i class='bx bxs-time' style="vertical-align: -3px;font-size: 25px"></i>
                        Absensi
                    </p>
                </a>
            </li>
            @elseif(Str::length(Auth::guard('akun')->user()) > 0)
            <!-- Siswa -->
            <li class="nav-item">
                <a href="/" class="nav-link">
                    <p style="font-size: 18px; color: white">
                        {{-- <img src="{{asset ('/template/dist/img/QR.png') }}" alt="Logo"  > --}}
                        <i class='bx bxs-dashboard' style="vertical-align: -3px;font-size: 25px" ></i>
                        Dashboard
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="/logbook" class="nav-link" style="color: white"> --}}
                    {{-- <box-icon name='book-content' type='solid' ></box-icon> --}}
                    {{-- <i class="fa-solid fa-book"></i> --}}
                    {{-- <img src="{{asset ('/template/dist/img/BUKU.png') }}" alt="Logo"  >
                    Logbook
                </a>
            </li> --}}
            <!-- Siswa -->
            <li class="nav-item">
                <a href="/logbook" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/BUKU.png') }}" alt="Logo"  > --}}
                        <i class='bx bxs-book-content'style="vertical-align: -3px;font-size: 25px"  ></i>
                        Logbook
                    </p>
                </a>
            </li>
            <!-- siswa -->
            <li class="nav-item">
                <a href="/perizinan" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/perizinan.png') }}" alt="Logo"  > --}}
                        <i class='bx bxs-calendar'style="vertical-align: -3px;font-size: 25px"  ></i>
                        Perizinan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/report" class="nav-link" style="color: white">
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/report.png') }}" alt="Logo"  > --}}
                        <i class='bx bxs-report'style="vertical-align: -3px;font-size: 25px"  ></i>
                        Report dan sertifikat
                    </p>
                </a>
            </li>
            @endif

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
