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
                @empty($item->foto_mahasiswa)
                  <img 
                      src="{{ asset('admin/img/profile/nophoto.png') }}" 
                      style="height: 7rem; width: auto" 
                      alt="{{ $mahasiswa->nama_mahasiswa }}">
                  @else
                  <img 
                      src="{{ asset('admin/img/profile/mahasiswa') }}/{{ $mahasiswa->foto_mahasiswa }}" 
                      style="height: 7rem; width: auto" 
                      alt="{{ $mahasiswa->nama_mahasiswa }}">
                @endempty
              </td>
              <td>Tahun Akademik</td>
              <td>:</td>
              <td>{{ $ta->kode_tahunakademik }}</td>
            </tr>
            <tr style="font-size: .9rem;">
              <td>NIM</td>
              <td>:</td>
              <td>{{ $mahasiswa->nim_mahasiswa }}</td>
            </tr>
            <tr style="font-size: .9rem;">
              <td>Nama</td>
              <td>:</td>
              <td>{{ $mahasiswa->nama_mahasiswa }}</td>
            </tr>
            <tr style="font-size: .9rem;">
              <td>Program Studi</td>
              <td>:</td>
              <td>{{ $mahasiswa->prodi_mahasiswa }}</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col align-self-end">
        <a href="{{ route('krsPDF.mahasiswa') }}" class="btn text-white" 
          style="background-color: #ea0606">
          <i class="bi bi-printer"></i>
          <span style="font-size: .9rem;">Cetak KRS</span>
        </a>
      </div>
    </div>
  </div>
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
          <a type="submit" class="btn btn-md btn-info text-light mt-3 ms-3" style="font-size: .9rem;" href="{{ route('krs.create') }}">
            <i class="bi bi-plus-lg"></i> Ambil KRS            
          </a>
          <div class="table-responsive">
            <table class="table table-sm table-striped table-border align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">#</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Hari</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Waktu</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Ruang</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Mata Kuliah</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">SKS</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Dosen</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Hapus</th>
                </tr>
              </thead>
              <tbody>
              @forelse ($items as $index => $item)
                <tr class="text-center font-sans" style="font-size: .9rem;">
                  <td>{{ $index+1 }}</td>
                  <td>{{ $item->jadwal['hari_jadwal'] }}</td>
                  <td>{{ $item->jadwal['waktu_jadwal'] }}</td>
                  <td>{{ $item->jadwal['ruangan']['kode_ruangan'] }}</td>
                  <td>{{ $item->jadwal['matkul']['nama_matkul'] }}</td>
                  <td class="text-center">{{ $item->jadwal['matkul']['sks_matkul'] }}</td>
                  <td>{{ $item->jadwal['dosen']['nama_dosen'] }}</td>
                  <td>
                    <form action="{{ route('krs.destroy', $item->id) }}" 
                      method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-sm  trashData" style="background-color: #ea0606;">
                          <i class="bi bi-trash3 text-light" style="font-size: .8rem;"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center">
                    Belum mengambil KRS
                  </td>
                </tr>
              @endforelse
              </tbody>
              <tfoot>
                <tr class="text-center font-sans" style="font-size: .75rem;">
                  <td colspan="2">Total SKS yang diambil</td>
                  <td>{{ $sumSks }}</td>
                  <td colspan="2"></td>
                </tr>
                <tr class="text-center font-sans" style="font-size: .75rem;">
                  <td colspan="2">Maksimal SKS yang diambil</td>
                  <td>{{ $maksSks }}</td>
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