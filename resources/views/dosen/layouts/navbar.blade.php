    {{-- <nav class="navbar navbar-main navbar-expand-lg px-0 mx-2 shadow-none border-radius-xl bg-white mt-3" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark" aria-current="page">Dosen</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              {{-- <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span> --}}
              {{-- <input type="text" class="form-control" placeholder="Type here..." hidden>
            </div>
          </div>
          <ul class="navbar-nav justify-content-end">
            {{-- SETTING PROFILE --}}
            {{-- <li class="nav-item px-3 d-flex align-items-center">
              <a href="{{ route('profile.dosen') }}" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li> --}}
            {{-- LOGOUT --}}
            {{-- <li class="nav-item d-flex align-items-center">
              <a href="{{ route('logout') }}" 
              class="nav-link text-body font-weight-bold px-0" style="color: rgba(1, 4, 136, 0.9)"
              onclick="event.preventDefault();
                document.getElementById('logout').submit();"> --}}
                {{-- <i class="fa fa-user me-sm-1"></i> --}}
                {{-- <span class="d-sm-inline d-none">
                  {{ __('Logout') }}
                </span> &nbsp;
                <i class="bi bi-box-arrow-right me-sm-1"></i>
              </a>
              <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav> --}} 

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-2 shadow-none border-radius-xl bg-white mt-3" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            {{-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li> --}}
            {{-- <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li> --}}
          </ol>
           {{-- <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6> --}}
            @if (Request::path() != 'dashboard/dosen')
              <h6 class="font-weight-bolder mb-0 text-capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
            @else
              <h6 class="font-weight-bolder mb-0 text-capitalize">Dashboard</h6>
            @endif
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              {{-- <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span> --}}
              <input type="text" class="form-control" placeholder="Type here..." hidden>
            </div>
          </div>
          <ul class="navbar-nav justify-content-end">
            {{-- SETTING PROFILE --}}
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="{{ route('profile.dosen') }}" class="nav-link {{ (Request::is('dashboard/dosen/profile') ? 'active' : '') }}">
                <i class="fa fa-user me-sm-1"></i>
              </a>
            </li>
            {{-- LOGOUT --}}
            <li class="nav-item d-flex align-items-center">
              <a href="{{ route('logout') }}"
              class="nav-link text-body font-weight-bold px-0" style="color: rgba(1, 4, 136, 0.9)"
              onclick="event.preventDefault();
                document.getElementById('logout').submit();">
                {{-- <i class="fa fa-user me-sm-1"></i> --}}
                <span class="d-sm-inline d-none">
                  {{ __('Logout') }}
                </span> &nbsp;
                <i class="bi bi-box-arrow-right me-sm-1"></i>
              </a>
              <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
