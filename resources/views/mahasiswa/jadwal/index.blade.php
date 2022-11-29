@extends('mahasiswa.layouts.app')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4 border-0" style="border-radius: 20px;">
        <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
          <h4>Daftar Jadwal Perkuliahan</h4>
        </div>
        <div class="card-body px-2 pt-0 pb-2">
          <div class="table-responsive p-4">
            <a href="{{ URL::to('/jadwal/pdf') }}" class="btn text-white" style="background-color: #ea0606">
              <i class="bi bi-printer"></i>
              <span style="font-size: .9rem;">Cetak Jadwal</span>
            </a>
            <table class="table table-striped table-border align-items-center mb-0" id="example">
              <thead>
                <tr>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Hari</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Waktu</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Mata Kuliah</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Nama Pengajar</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Ruangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwal as $row)
                <tr class="text-center font-sans">
                  <td>{{ $row->hari_jadwal }}</td>
                  <td>{{ $row->waktu_jadwal }}</td>
                  <td>{{ $row->matkul->nama_matkul }}</td>
                  <td>{{ $row->dosen->nama_dosen }}</td>
                  <td>{{ $row->ruangan->kode_ruangan }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection