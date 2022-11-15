<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" {{route('home')}}" style="color: rgba(1, 4, 136, 0.9)">
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
        <a class="nav-link active" href=" {{route('administrator')}} ">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-speedometer fs-6"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      {{-- KURIKULUM --}}
      <li class="nav-item">
        <a class="nav-link" href="{{url('administrator/kurikulum')}} ">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-layout-text-sidebar-reverse fs-6"></i>
          </div>
          <span class="nav-link-text ms-1">Kurikulum</span>
        </a>
      </li>
      {{-- DATA MASTER --}}
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Master</h6>
      </li>
      {{-- DATA DOSEN --}}
      <li class="nav-item">
        <a class="nav-link" href="{{url('administrator/dosen')}} ">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-person-lines-fill fs-6"></i>
          </div>
          <span class="nav-link-text ms-1">Data Dosen</span>
        </a>
      </li>
      {{-- DATA MAHASISWA --}}
      <li class="nav-item">
        <a class="nav-link" href="{{url('administrator/mahasiswa')}} ">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-people-fill fs-6"></i>
          </div>
          <span class="nav-link-text ms-1">Data Mahasiswa</span>
        </a>
      </li>
      {{-- TAHUN AKADEMIK --}}
      <li class="nav-item">
        <a class="nav-link  " href="{{url('administrator/tahun-akademik')}} ">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-calendar-fill fs-6"></i>
          </div>
          <span class="nav-link-text ms-1">Tahun Akademik</span>
        </a>
      </li>
      {{-- MATA KULIAH --}}
      <li class="nav-item">
        <a class="nav-link  " href="{{url('administrator/mata-kuliah')}} ">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-card-list fs-6"></i>
          </div>
          <span class="nav-link-text ms-1">Mata Kuliah</span>
        </a>
      </li>
      {{-- RUANGAN --}}
      <li class="nav-item">
        <a class="nav-link  " href="{{url('administrator/ruangan')}} ">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-grid-1x2 fs-6"></i>
          </div>
          <span class="nav-link-text ms-1">Ruangan</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
