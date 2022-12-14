@extends('mahasiswa.layouts.app')

@section('content')
<div class="container-fluid py-4">
  <div class="card mb-4 border-0" style="border-radius: 20px;">
    <div class="row">
      <div class="col">
        <div class="table-responsive p-4">
          <table class="table align-items-center mb-0" style="width: 60%">
            <tr style="font-size: .9rem;">
              <td rowspan="4">
                <img src="{{ asset('public/dashboard/img/team-1.jpg') }}" style="height: 7rem; width:auto;" alt="">
              </td>
              <td>NIM</td>
              <td>:</td>
              <td>19051204039</td>
            </tr>
            <tr style="font-size: .9rem;">
              <td>Nama</td>
              <td>:</td>
              <td>Cindy Viona</td>
            </tr>
            <tr style="font-size: .9rem;">
              <td>Batas SKS semester ini</td>
              <td>:</td>
              <td>24</td>
            </tr>
            <tr style="font-size: .9rem;">
              <td>SKS yang sudah ditempuh</td>
              <td>:</td>
              <td>0</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col align-self-end">
        <a href="{{ URL::to('/krs/pdf') }}" class="btn text-white" style="background-color: #ea0606">
          <i class="bi bi-printer"></i>
          <span style="font-size: .9rem;">Cetak KRS</span>
        </a>
      </div>
    </div>
  </div>
  {{-- OPTION 1 --}}
  <div class="card mb-4 border-0" style="border-radius: 20px;">
    <div class="card-header border-0 pb-0 text-center" style="background-color: #fff; border-radius: 20px;">
      <div class="row">
        <div class="col">
          <h6><small>KELAS YANG DITAWARKAN</small></h6>
        </div>
        <div class="col">
          <h6><small>KELAS YANG DIAMBIL SEMESTER</small></h6>
        </div>
      </div>
    </div>
    <div class="card-body row justify-content-between pt-0 pb-2">
      <div class="col-6 table-responsive">
        <table class="table table-sm table-striped table-border align-items-center mb-0" id="example">
          <thead>
            <tr>
              <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Mata Kuliah</th>
              <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">SKS</th>
              <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Hari</th>
              <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Waktu</th>
              <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Ruangan</th>
              <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">ADD</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($jadwal as $row)
            <tr class="text-center font-sans" style="font-size: .75rem;">
              <td>{{ $row->matkul->nama_matkul }}</td>
              <td>{{ $row->matkul->sks_matkul }}</td>
              <td>{{ $row->hari_jadwal }}</td>
              <td>{{ $row->waktu_jadwal }}</td>
              <td>{{ $row->ruangan->kode_ruangan }}</td>
              <td>
                <button class="btn btn-sm m-0 px-3" style="background-color: #82d616">
                  <i class="bi bi-arrow-90deg-right text-white fs-6"></i>
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-6 table-responsive">
        <table class="table table-sm table-striped table-border align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">DROP</th>
              <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Mata Kuliah</th>
              <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">SKS</th>
              <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Hari</th>
              <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Waktu</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-center font-sans" style="font-size: .75rem;">
              <td>
                <button class="btn btn-sm m-0 px-3" style="background-color: #ea0606">
                  <i class="bi bi-arrow-90deg-left text-white fs-6"></i>
                </button>
              </td>
              <td>Dasar Pemrograman</td>
              <td>2</td>
              <td>Senin</td>
              <td>08.40-09.30</td>
            </tr>
          </tbody>
          <tfoot>
            <tr class="text-center font-sans" style="font-size: .75rem;">
              <td colspan="2">SKS semester ini</td>
              <td>2</td>
              <td colspan="2"></td>
            </tr>
            <tr class="text-center font-sans" style="font-size: .75rem;">
              <td colspan="2">Total SKS</td>
              <td>2</td>
              <td colspan="2"></td>
            </tr>
          </tfoot>
        </table>
      </div>
      </div>
    </div>
  </div>
  {{-- OPTION 2 --}}
  <div class="card mb-4 border-0" style="border-radius: 20px;">
    <div class="card-header border-0 pb-0 text-center" style="background-color: #fff; border-radius: 20px;">
      <div class="row">
        <div class="col">
          <h6><small>KELAS YANG DIAMBIL SEMESTER INI</small></h6>
        </div>
      </div>
    </div>
    <div class="card-body pt-0 pb-2">
      <div class="row">
        <div class="col">
          <a class="btn btn-md btn-info text-light mt-3 ms-3" style="font-size: .9rem;" href="{{ route('krs.create') }}">
            <i class="bi bi-plus-lg"></i> Ambil KRS            
          </a>
          <div class="table-responsive">
            <table class="table table-sm table-striped table-border align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">No.</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Mata Kuliah</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">SKS</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Hari</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Waktu</th>
                </tr>
              </thead>
              <tbody>
                @php $no= 1; @endphp
                @foreach ($jadwal as $row)
                <tr class="text-center font-sans" style="font-size: .9rem;">
                  <td>{{ $no++ }}</td>
                  <td>{{ $row->matkul->nama_matkul }}</td>
                  <td>{{ $row->matkul->sks_matkul }}</td>
                  <td>{{ $row->hari_jadwal }}</td>
                  <td>{{ $row->waktu_jadwal }}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr class="text-center font-sans" style="font-size: .75rem;">
                  <td colspan="2">SKS semester ini</td>
                  <td>2</td>
                  <td colspan="2"></td>
                </tr>
                <tr class="text-center font-sans" style="font-size: .75rem;">
                  <td colspan="2">Total SKS</td>
                  <td>2</td>
                  <td colspan="2"></td>
                </tr>
              </tfoot>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection