@extends('mahasiswa.layouts.app')

@section('content')
<div class="container-fluid py-4">
  <div class="card mb-4 border-0" style="border-radius: 20px;">
    <div class="card-header border-0 pb-0 text-center" style="background-color: #fff; border-radius: 20px;">
      <div class="row">
        <div class="col">
          <h6><small>KELAS YANG DITAWARKAN</small></h6>
        </div>
      </div>
    </div>
    <div class="card-body pt-0 pb-2">
      <form action="{{ route('krs.store') }}">
          <div class="table-responsive">
            <button type="submit" class="btn btn-md btn-info text-light mt-4 font-sans">Simpan Perubahan</button>
            <table class="table table-sm table-striped table-border align-items-center mb-0" id="example">
              <thead>
                <tr>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Mata Kuliah</th>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">SKS</th>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Hari</th>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Waktu</th>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Ruangan</th>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">ADD</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwal as $row)
                <tr class="text-center font-sans" style="font-size: .9rem;">
                  <td>{{ $row->matkul->nama_matkul }}</td>
                  <td>{{ $row->matkul->sks_matkul }}</td>
                  <td>{{ $row->hari_jadwal }}</td>
                  <td>{{ $row->waktu_jadwal }}</td>
                  <td>{{ $row->ruangan->kode_ruangan }}</td>
                  <td>
                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection