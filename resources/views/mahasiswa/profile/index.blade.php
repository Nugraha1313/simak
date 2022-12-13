@extends('mahasiswa.layouts.app')
@section('content')
  <div class="card mt-3 ms-2" style="width: 60rem;">
    <div class="card-header">
      <h4>Profile</h4>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <div class="table-responsive p-4">
          <div class="col-md-3 me-1" style="float: left">
            {{-- <div class="col-md-4"> --}}
              @empty($item->foto_mahasiswa)
                <img 
                  src="{{ asset('admin/img/profile/nophoto.png') }}" 
                  style="height: 10rem; width: 10rem; border-radius: 100%" 
                  alt="{{ $item->nama_mahasiswa }}">
                @else
                <img 
                  src="{{ asset('admin/img/profile/mahasiswa') }}/{{ $item->foto_mahasiswa }}" 
                  style="height: 10rem; width: 10rem; border-radius: 100%" 
                  alt="{{ $item->nama_mahasiswa }}">
              @endempty
              <a href="{{ route('editProfile.mahasiswa') }}" class="btn btn-sm btn-info mt-2">
                <i class="bi bi-pencil-square text-light" style="font-size: .8rem;"></i> &nbsp; Updated Profile
              </a>
            {{-- </div> --}}
          </div>
          <div class="col-md-9">
            <h3>{{ $item->nama_mahasiswa }}</h3>
            <table class="table table-sm table-striped table-border align-items-center mb-0" style="width: 65%">
              <tr>
                <th width="30%">Email</th>
                <td>
                  <a href="mailto:{{ $item->email_mahasiswa }}">{{ $item->email_mahasiswa }}</a>
                </td>
              </tr>
              <tr>
                <th width="30%">NIM</th>
                <td>{{ $item->nim_mahasiswa }}</td>
              </tr>
              <tr>
                <th width="30%">Program Studi</th>
                <td>{{ $item->prodi_mahasiswa }}</td>
              </tr>
              <tr>
                <th width="30%">Jenis Kelamin</th>
                <td>{{ $item->gender_mahasiswa }}</td>
              </tr>
              <tr>
                <th width="30%">Tempat, Tanggal Lahir</th>
                <td>{{ $item->tmp_mahasiswa }}, {{ date('d F Y', strtotime($item->tgl_mahasiswa)) }}</td>
              </tr>
              <tr>
                <th width="30%">Agama</th>
                <td>{{ $item->agama_mahasiswa }}</td>
              </tr>
              <tr>
                <th width="30%">No. Hp</th>
                <td>{{ $item->telp_mahasiswa }}</td>
              </tr>
              <tr>
                <th width="30%">Alamat</th>
                <td>{{ $item->alamat_mahasiswa }}</td>
              </tr>
            </table>
          </div>
          <div class="row">
            <div class="col-md-8">
              <a href="{{ route('dashboard.mahasiswa') }}" class="btn btn-success pull-left">
              <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
@endsection