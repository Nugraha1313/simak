@extends('dosen.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0" style="border-radius: 20px;">
                <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
                    <div class="col">
                        <a href="{{ route('nilai.edit' , $id) }}" class="btn btn-success mt-3 mb-3">Isi Nilai</a>
                    </div>
                    <h4>Tahun Akademik : {{ $ta->kode_tahunakademik }}</h4>
                    <div class="row">
                        <div class="col-md-12">
                        <table>
                            <tr>
                                <th>Mata Kuliah</th>
                                <td>:</td>
                                <td>{{$jadwal->matkul->nama_matkul}}</td>
                            </tr>
                            <tr>
                                <th>Dosen</th>
                                <td>:</td>
                                <td>{{$jadwal->dosen->nama_dosen}}</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="card-body px-2 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table class="table table-striped table-sm align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">No.</th>
                                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">NIM</th>
                                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no= 1; @endphp
                            @forelse ($items as $item)
                                <tr class="text-center font-sans">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->mahasiswa->nim_mahasiswa }}</td>
                                    <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                                    <td>
                                        {{ number_format(($item->skor_nilai), 2) }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center font-sans">
                                    <td>
                                        Mahasiswa belum mengambil mata kuliah ini.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="row mt-4">
                            <div class="col-md-8">
                                <a href="{{ route('nilai.listNilai') }}" class="btn btn-success pull-left">
                                <i class="fa fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection