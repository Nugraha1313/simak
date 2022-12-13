<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ route('home') }}" style="color: rgba(1, 4, 136, 0.9)">
      {{-- <img src=" {{asset('landingpage/img/logo.png')}} " class="navbar-brand-img h-100" alt="main_logo"> --}}
      <i class="fas fa-graduation-cap fs-3"></i>
      <span class="ms-1 fs-3 fw-bold">SIMAK</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      {{-- DASHBOARD --}}
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard/mahasiswa') ? 'active' : '') }}" href="{{ route('dashboard.mahasiswa') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-speedometer fs-6"></i>
          </div>
          <span class="nav-link-text fs-6 ms-1">Dashboard</span>
        </a>
      </li>
      {{-- PERKULIAHAN --}}
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Perkuliahan</h6>
      </li>
      {{-- KRS --}}
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard/mahasiswa/krs') ? 'active' : '') }}" href="{{ route('krs.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-layout-text-sidebar-reverse fs-6"></i>
          </div>
          <span class="nav-link-text fs-6 ms-1">KRS</span>
        </a>
      </li>
      {{-- JADWAL --}}
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard/mahasiswa/jadwal') ? 'active' : '') }}" href="{{ route('jadwal.mahasiswa') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-layout-text-sidebar-reverse fs-6"></i>
          </div>
          <span class="nav-link-text fs-6 ms-1">Jadwal Perkuliahan</span>
        </a>
      </li>
      {{-- LAPORAN --}}
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laporan</h6>
      </li>
      {{-- KHS --}}
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard/mahasiswa/khs') ? 'active' : '') }}" href="{{ route('khs') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-layout-text-sidebar-reverse fs-6"></i>
          </div>
          <span class="nav-link-text fs-6 ms-1">KHS</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
