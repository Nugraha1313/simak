@extends('dosen.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 border-0" style="border-radius: 20px;">
                <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
                    <h4>List Data Nilai</h4>
                </div>
                <div class="card-body px-2 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table class="table table-striped table-sm align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Hari</th>
                                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Waktu</th>
                                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Mata Kuliah</th>
                                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Ruangan</th>
                                    <th class="text-center text-secondary text-s font-weight-bolder opacity-7">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($datas as $data)
                                <tr class="text-center font-sans">
                                    <td>{{ $data->hari_jadwal }}</td>
                                    <td>{{ $data->waktu_jadwal }}</td>
                                    <td>{{ $data->matkuls->nama }}</td>
                                    <td>
                                        {{ $data->ruangan->kode_ruangan }}
                                    </td>
                                    <td>
                                        <a href="{{ route('nilai.show', $item->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square text-light" style="font-size: .8rem;">&nbsp; Isi Nilai</i> 
                                        </a>
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
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection