@extends('dosen.layouts.app')
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
              @empty($item->foto_dosen)
                <img 
                  src="{{ asset('admin/img/profile/nophoto.png') }}" 
                  style="height: 10rem; width: 10rem; border-radius: 100%" 
                  alt="{{ $item->nama_dosen }}">
                @else
                <img 
                  src="{{ asset('admin/img/profile/dosen') }}/{{ $item->foto_dosen }}" 
                  style="height: 10rem; width: 10rem; border-radius: 100%" 
                  alt="{{ $item->nama_dosen }}">
              @endempty
              <a href="{{ route('editProfile.dosen') }}" class="btn btn-sm btn-info mt-2">
                <i class="bi bi-pencil-square text-light" style="font-size: .8rem;"></i> &nbsp; Updated Profile
              </a>
            {{-- </div> --}}
          </div>
          <div class="col-md-9">
            <h3>{{ $item->nama_dosen }}</h3>
            <table class="table table-sm table-striped table-border align-items-center mb-0" style="width: 65%">
              <tr>
                <th width="30%">Email</th>
                <td>
                  <a href="mailto:{{ $item->email_dosen }}">{{ $item->email_dosen }}</a>
                </td>
              </tr>
              <tr>
                <th width="30%">NIP</th>
                <td>{{ $item->nip_dosen }}</td>
              </tr>
              <tr>
                <th width="30%">Program Studi</th>
                <td>{{ $item->prodi_dosen }}</td>
              </tr>
              <tr>
                <th width="30%">Jenis Kelamin</th>
                <td>{{ $item->gender_dosen }}</td>
              </tr>
              <tr>
                <th width="30%">Tempat, Tanggal Lahir</th>
                <td>{{ $item->tmp_dosen }}, {{ date('d F Y', strtotime($item->tgl_dosen)) }}</td>
              </tr>
              <tr>
                <th width="30%">Agama</th>
                <td>{{ $item->agama_dosen }}</td>
              </tr>
              <tr>
                <th width="30%">No. Hp</th>
                <td>{{ $item->telp_dosen }}</td>
              </tr>
              <tr>
                <th width="30%">Alamat</th>
                <td>{{ $item->alamat_dosen }}</td>
              </tr>
            </table>
          </div>
          <div class="row">
            <div class="col-md-8">
              <a href="{{ route('dashboard.dosen') }}" class="btn btn-success pull-left">
              <i class="fa fa-arrow-left"></i>
              </a>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
@endsection