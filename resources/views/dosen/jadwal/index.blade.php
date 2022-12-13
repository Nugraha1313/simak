@extends('dosen.layouts.app')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4 border-0" style="border-radius: 20px;">
        <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
          <h4>Daftar Jadwal Mengajar</h4>
          <div class="col-md-3 mt-4">
            <a href="{{ route('jadwalPDF.dosen') }}" class="btn text-white" style="background-color: #ea0606">
              <i class="bi bi-printer"></i>
              <span style="font-size: .9rem;">Download Jadwal</span>
            </a>
          </div>
        </div>
        <div class="card-body px-2 pt-0 pb-2">
          <div class="table-responsive p-4">
            <table class="table table-striped table-border align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">#</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Hari</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Waktu</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Mata Kuliah</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Ruangan</th>
                </tr>
              </thead>
              <tbody>
              @forelse ($datas as $index => $data)
                <tr class="text-center font-sans" style="font-size: .9rem;">
                  <td>{{ $index+1 }}</td>
                  <td>{{ $data->hari_jadwal }}</td>
                  <td>{{ $data->waktu_jadwal }}</td>
                  <td class="text-start">{{ $data->matkul->nama_matkul }}</td>
                  <td>{{ $data->ruangan->kode_ruangan }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center">
                    Mahasiswa belum mengambil KRS
                  </td>
                </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection