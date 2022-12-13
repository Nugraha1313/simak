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
      <div class="table-responsive">
        <table class="table table-sm table-striped table-border align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-center text-secondary text-s font-weight-bolder opacity-7">#</th>
              <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Hari</th>
              <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Waktu</th>
              <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Ruangan</th>
              <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Kode</th>
              <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Mata Kuliah</th>
              <th class="text-center text-secondary text-s font-weight-bolder opacity-7">SKS</th>
              <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Dosen</th>
              <th class="text-center text-secondary text-s font-weight-bolder opacity-7">ADD</th>
            </tr>
          </thead>
          <tbody>
          <form action="{{ route('krs.store') }}" method="POST">
            @csrf
            <input type="hidden" name="mhsId" value="{{ $mhsId }}">
            <input type="hidden" name="taId" value="{{ $taId }}">
            <input type="hidden" name="sumSks" value="{{ $sumSks }}">
            <input type="hidden" name="maksSks" value="{{ $maksSks }}">
            @forelse ($data as $index => $item)
              <tr class="text-center font-sans" style="font-size: .9rem;">
                <td>{{ $index+1 }}</td>
                <td>{{ $item->hari_jadwal }}</td>
                <td>{{ $item->waktu_jadwal }}</td>
                <td>{{ $item->ruangan->kode_ruangan }}</td>
                <td>{{ $item->matkul->kode_matkul}}</td>
                <td>{{ $item->matkul->nama_matkul }}</td>
                <td class="text-center">{{ $item->matkul->sks_matkul }}</td>
                <td>{{ $item->dosen->nama_dosen }}</td>
                <td>
                  <input class="form-check-input" type="checkbox" id="defaultCheck{{ $item->id }}" value="{{ $item->id }}" name="matkul[]">
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="9" class="text-center">
                  Data tidak tersedia
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <div class="col-sm-10">
          <a href="{{ route('krs.index') }}" class="btn btn-success mt-4 pull-left">
            <i class="fa fa-arrow-left"></i>
          </a>
          &nbsp;
          <button type="submit" class="btn btn-md btn-info text-light mt-4 font-sans">Simpan Perubahan</button>
        </div>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection