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

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @if (Auth::guard('akun')->user()->role == 'admin')
                <li class="nav-item">
                    <a href="/jumlah-peserta" class="nav-link" style="color: white">
                        <i class='bx bxs-dashboard' style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/peserta" class="nav-link" style="color: white">
                        <i class='bx bx-child' style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Peserta
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/izin_admin" class="nav-link" style="color: white">
                        <i class='bx bxs-calendar'style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Perizinan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/settingmagang" class="nav-link" style="color: white">
                        <i class='bx bxs-cog' style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Setting Magang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pembimbing" class="nav-link" style="color: white">
                        <i class='bx bx-male'style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Pembimbing
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/sekolah" class="nav-link" style="color: white">
                        <i class='bx bxs-school'style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Data Sekolah
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/bidang" class="nav-link" style="color: white">
                        <i class='bx bxs-objects-horizontal-left' style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Data Jurusan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" style="color: white">
                        <i class='bx bxs-book-open'style="vertical-align: -3px;font-size: 25px"></i>
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
                            Komponen Penilaian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/penilaian" class="nav-link" style="color: white">
                        <i class='bx bx-book-bookmark' style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Penilaian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/absensi" class="nav-link" style="color: white">
                        <i class='bx bxs-time' style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Absensi
                        </p>
                    </a>
                </li>
            @elseif(Auth::guard('akun')->user())
                <li class="nav-item">
                    <a href="/scan" class="nav-link">
                        <i class='bx bxs-dashboard text-white' style="vertical-align: -3px;font-size: 25px"></i>
                        <p style="font-size: 18px; color: white">
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/logbook" class="nav-link" style="color: white">
                        <i class='bx bxs-book-content'style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Logbook
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/perizinan" class="nav-link" style="color: white">
                        <i class='bx bxs-calendar'style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Perizinan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/tampilan" class="nav-link" style="color: white">
                        <i class='bx bxs-report'style="vertical-align: -3px;font-size: 25px"></i>
                        <p>
                            Report dan sertifikat
                        </p>
                    </a>
                </li>
            @elseif(Auth::guard('akun')->user()->role == 'pembimbing')
                <p>jnj</p>
            @endif
            {{-- <li class="nav-item bg-danger">
                <a class="nav-link" href="{{ route('logout') }}"> Logout </a>
            </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
