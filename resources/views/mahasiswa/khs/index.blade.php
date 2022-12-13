@extends('mahasiswa.layouts.app')

@section('content')
  <div class="card mt-3 ms-2" style="width: 65rem;">
    <div class="card-header">
      <h4>Kartu Hasil Studi - {{ $ta->kode_tahunakademik }}</h4>
    </div>
    <ul class="list-group list-group-flush mt-2">
      <li class="list-group-item">
        <div class="row">
          <div class="col-md-6">
            <table class="table-custom">
              <tr>
                <th class="text-end">Mahasiswa</th>
                <td>&nbsp;</td>
                <td class="text-start">{{ $mahasiswa->nama_mahasiswa }}</td>
              </tr>
              <tr>
                <th class="text-end">NIM</th>
                <td>&nbsp;</td>
                <td class="text-start">{{ $mahasiswa->nim_mahasiswa }}</td>
              </tr>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table-custom">
              <tr>
                <th class="text-end">Program Studi</th>
                <td>&nbsp;</td>
                <td class="text-start">{{ $mahasiswa->prodi_mahasiswa }}</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-3 mt-2">
          <a href="{{ route('KHS-NFComputer') }}" class="btn text-white" style="background-color: #ea0606">
            <i class="bi bi-printer"></i>
            <span style="font-size: .9rem;">Download KHS</span>
          </a>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-sm table-striped table-border align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">#</th>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">KODE MK</th>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">MATA KULIAH</th>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">SKS</th>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">NILAI</th>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">BOBOT</th>
                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Bobot x SKS</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($nilais as $index => $nilai)
                  <tr class="text-center font-sans" style="font-size: .9rem;">
                    <td>{{ $index+1 }}</td>
                    <td class="text-center">{{ $nilai->jadwal->matkul->kode_matkul }}</td>
                    <td class="text-start">{{ $nilai->jadwal->matkul->nama_matkul }}</td>
                    <td class="text-center">{{ $nilai->jadwal->matkul->sks_matkul }}</td>
                    <td class="text-center">
                      @if ($nilai->skor_nilai == 4.00)
                      {{"A"}}
                      @elseif ($nilai->skor_nilai >= 3.70 && $nilai->skor_nilai < 4.00)
                      {{"A-"}}
                      @elseif ($nilai->skor_nilai >= 3.30 && $nilai->skor_nilai < 3.70)
                        {{"B+"}}
                      @elseif ($nilai->skor_nilai >= 3.00 && $nilai->skor_nilai < 3.30)
                      {{"B"}}
                      @elseif ($nilai->skor_nilai >= 2.70 && $nilai->skor_nilai < 3.00)
                      {{"B-"}}
                      @elseif ($nilai->skor_nilai >= 2.30 && $nilai->skor_nilai < 2.70)
                      {{"C+"}}
                      @elseif ($nilai->skor_nilai >= 2.00 && $nilai->skor_nilai < 2.30)
                      {{"C"}}
                      @elseif ($nilai->skor_nilai >= 1.70 && $nilai->skor_nilai < 2.00)
                      {{"C-"}}
                      @elseif ($nilai->skor_nilai >= 1.00 && $nilai->skor_nilai < 1.70)
                      {{"D"}}
                      @elseif ($nilai->skor_nilai == 0)
                        {{"E"}}
                      @else
                      {{""}}
                      @endif
                    </td>
                    <td class="text-center">
                      {{ number_format(($nilai->skor_nilai), 2) }}
                    </td>
                    <td class="text-center">
                      {{ number_format(($nilai->skor_nilai * $nilai->jadwal->matkul->sks_matkul), 2) }}
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center">
                      Belum mengambil KRS
                    </td>
                  </tr>
                @endforelse
                </tbody>
                <tfoot>
                  <tr style="font-size: .9rem; font-weight: bold;">
                    <th colspan="2">&nbsp;</th>
                    <th class="text-end">TOTAL</th>
                    <th class="text-center">{{ $sumSks }}</th>
                    <th colspan="2">&nbsp;</th>
                    <th class="text-center">
                      {{ number_format(($sumBobot), 2) }}
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-6 float-end mt-4 mb-4">
          <div class="table-responsive">
            <table class="table table-sm table-border align-items-center mb-0">
              <tbody>
                <tr style="font-size: .9rem; font-weight: bold;">
                  <th width="50%">Indeks Prestasi Semester</th>
                  <td class="text-center">
                    {{ number_format(($sumBobot / $sumSks), 2) }}
                  </td>
                </tr>
                <tr style="font-size: .9rem; font-weight: bold;">
                  <th width="50%">Indeks Prestasi Kumulatif</th>
                  <td class="text-center">
                    {{ number_format(($sumBobot / $sumSks), 2) }}
                  </td>
                </tr>
                <tr style="font-size: .9rem; font-weight: bold;">
                  <th width="50%">Total SKS Lulus</th>
                  <td class="text-center">
                    {{ $sumSks }}
                  </td>
                </tr>
                <tr style="font-size: .9rem; font-weight: bold;">
                  <th width="50%">Total SKS Perolehan</th>
                  <td class="text-center">
                    {{ $sumSks }}
                  </td>
                </tr>
                <tr style="font-size: .9rem; font-weight: bold;">
                  <th width="50%">Maks SKS Semester Depan</th>
                  <td class="text-center">
                    24
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </li>
    </ul>
  </div>
@endsection