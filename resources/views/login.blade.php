@extends('app')
@section('content')
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-2">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome Back to <b>SIMAK</b></h3>
                  <p class="mb-0">Enter your email and password to login</p>
                </div>
                <div class="card-body">
                  @if (session('status'))
                    <div class="alert alert-danger">
                      {{ session('status') }}
                    </div>
                  @endif
                  <form action="{{ route('lastlogin') }}" method="POST">
                    @csrf
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" name="username" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    {{-- <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div> --}}
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Login</button>
                    </div>
                  </form>
                </div>
                {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="javascript:;" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div> --}}
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url({{ asset('admin/img/curved-images/curved6.jpg') }})"></div>
                <div class="card card-plain mt-5" style="background-color: darkslateblue">
                  <table class="table text-white">
                    <tr>
                      <td rowspan="2">Admin:</td>
                      <td>grandy16@gmail.com</td>
                    </tr>
                    <tr>
                      <td>grandy22@admin</td>
                    </tr>
                    <tr>
                      <td rowspan="2">Dosen:</td>
                      <td>rafady22@simak.ac.id</td>
                    </tr>
                    <tr>
                      <td>rafady@22dos</td>
                    </tr>
                    <tr>
                      <td rowspan="2">Mahasiswa:</td>
                      <td>prady11@mhs.simak.ac.id</td>
                    <tr>
                      <td>dygra22@mahasiswa</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection