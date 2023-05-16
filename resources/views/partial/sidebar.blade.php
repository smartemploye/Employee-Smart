<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel pb-5 d-flex">
        <li class="nav-link">
            <a class="brand-link">
                <img src="https://team.garudacyber.co.id/upload/icon/icon-HiWZJbTnmXQq.ico" alt="Logo"
                    style="margin-left: -13px">
                {{-- <img src="{{ asset('/template/dist/img/GCI.png') }}" alt="Logo"> --}}
                <p style="font-size: 17px; color: white; margin-left: 35px;margin-top: -30px;">
                    {{-- <img src="{{asset ('/template/dist/img/QR.png') }}" alt="Logo"  > --}}
                    Garuda Cyber Indonesia
                </p>
            </a>
        </li>
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
                    <i class='bx bxs-dashboard text-white' style="vertical-align: -3px;font-size: 25px"></i>
                    <p style="font-size: 18px; color: white">
                        {{-- <img src="{{asset ('/template/dist/img/QR.png') }}" alt="Logo"  > --}}
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
            <li class="nav-item">
                <a href="/logbook" class="nav-link" style="color: white">
                    <i class='bx bxs-book-content'style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/BUKU.png') }}" alt="Logo"  > --}}
                        Logbook
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/perizinan" class="nav-link" style="color: white">
                    <i class='bx bxs-calendar'style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/perizinan.png') }}" alt="Logo"  > --}}
                        Perizinan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/report" class="nav-link" style="color: white">
                    <i class='bx bxs-report'style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/report.png') }}" alt="Logo"  > --}}
                        Report dan sertifikat
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/dashboard" class="nav-link" style="color: white">
                    <i class='bx bxs-dashboard' style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/dashboard.png') }}" alt="Logo"  > --}}
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/peserta" class="nav-link" style="color: white">
                    <i class='bx bx-child' style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Peserta.png') }}" alt="Logo"  > --}}
                        Peserta
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/settingmagang" class="nav-link" style="color: white">
                    <i class='bx bxs-cog' style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Setting.png') }}" alt="Logo"  > --}}
                        Setting Magang
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/pembimbing" class="nav-link" style="color: white">
                    <i class='bx bx-male'style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Pembimbing.png') }}" alt="Logo"  > --}}
                        Pembimbing
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/sekolah" class="nav-link" style="color: white">
                    <i class='bx bxs-school'style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Sekolah.png') }}" alt="Logo"  > --}}
                        Data Sekolah
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/bidang" class="nav-link" style="color: white">
                    <i class='bx bxs-objects-horizontal-left' style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Bidang.png') }}" alt="Logo"  > --}}
                        Data Bidang
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" style="color: white">
                    <i class='bx bxs-book-open'style="vertical-align: -3px;font-size: 25px"></i>
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                    <p>
                        Report
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/show-map" class="nav-link" style="color: white">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Grafik</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/datatable" class="nav-link" style="color: white">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Table</p>
                      </a>
                    </li>
                  </ul>
            </li>
            <li class="nav-item">
                <a href="/komponenpenilaian" class="nav-link" style="color: white">
                    <i class='bx bx-book-alt' style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Komponen.png') }}" alt="Logo"  > --}}
                        Komponen Penilaian
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/penilaian" class="nav-link" style="color: white">
                    <i class='bx bx-book-bookmark' style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Nilai.png') }}" alt="Logo"  > --}}
                        Penilaian
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/scan" class="nav-link" style="color: white">
                    <i class='bx bxs-time' style="vertical-align: -3px;font-size: 25px"></i>
                    <p>
                        {{-- <img src="{{asset ('/template/dist/img/Absen.png') }}" alt="Logo"  > --}}
                        Absensi
                    </p>
                </a>
            </li>

            <li class="nav-item bg-danger">
                <a class="nav-link" href="{{ route('logout') }}"> Logout </a>
                    {{-- <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Logout
                </a> --}}

                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> --}}
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
