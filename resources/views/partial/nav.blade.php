<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
    </ul>
    <ul class="navbar-nav ml-auto">

      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
      <div class="image">
        @if (Auth::guard('akun')->user()->role == 'siswa')
        <img src="{{asset ('image/fotosiswa/'.auth()->user()->siswa->foto_siswa) }}" class="img-circle elevation-2" alt="0" style="margin-top: 0px; width: 50px;height: 50px;margin-right: 10px">
        @endif
      </div>
      <li>
        <div class="info">
            @if (Auth::guard('akun')->user()->role == 'siswa')
            <a href="/profile" class="d-block" style="margin-top: 10px;margin-right: 10px">{{ auth()->user()->siswa->nama_siswa }}</a>
            @elseif(Auth::guard('akun')->user()->role == 'pembimbing')
            <a href="#" class="d-block" style="margin-top: 10px;margin-right: 10px">{{ auth()->user()->pembimbing->nama_pembimbing }}</a>
            @else
            <a href="/profile_admin" class="d-block" style="margin-top: 10px;margin-right: 10px">{{ auth()->user()->username }}</a>
            @endif
          </div>
        {{-- <div class="info">
            <a href="/profile" class="d-block" style="margin-top: 10px;margin-right: 10px">{{ auth()->user()->admin->nama_admin }}</a>
        </div> --}}
      </li>
    </ul>
    <div class="btn-group">
        <button type="button" class="dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
        <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        <div class="dropdown-divider"></div>
    <!-- Right navbar links -->
  </nav>
  {{-- {{ auth()->user()->siswa->nama_siswa }} --}}
