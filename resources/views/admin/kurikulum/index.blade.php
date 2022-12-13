@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4 border-0" style="border-radius: 20px;">
          <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
            <div class="col">
                <a type="submit" href="{{ route('kurikulum.create') }}" class="btn btn-primary pull-right">Add</a>
                <div class="clearfix"></div>
            </div>
            <h4>Kurikulum</h4>
          </div>
          <div class="card-body px-2 pt-0 pb-2">
            <div class="table-responsive p-4">
              <table class="table table-striped table-border align-items-center mb-0" id="example">
                <thead>
                    <tr>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7" rowspan="2">No.</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7" colspan="3">Mata Kuliah</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7" colspan="2">Jadwal</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7" rowspan="2">Pengajar</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7" rowspan="2">Ruangan</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7" rowspan="2">AKSI</th>
                    </tr>
                    <tr>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Kode</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Nama</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">SKS</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Hari</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                @php $no = 1 @endphp
                @forelse ($items as $item)
                    <tr class="text-center font-sans">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->matkul->kode_matkul }}</td>
                        <td>{{ $item->matkul->nama_matkul }}</td>
                        <td>{{ $item->matkul->sks_matkul }}</td>
                        <td>{{ $item->hari_jadwal }}</td>
                        <td>{{ $item->waktu_jadwal }}</td>
                        <td>{{ $item->dosen->nama_dosen }}</td>
                        <td>{{ $item->ruangan->kode_ruangan }}</td>
                        <td>
                            <a href="{{ route('kurikulum.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square text-light" style="font-size: .8rem;"></i>
                            </a>
                            <form action="{{ route('kurikulum.destroy', $item->id) }}" 
                                method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm trashData" style="background-color: #ea0606;">
                                    <i class="bi bi-trash3 text-light" style="font-size: .8rem;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                  @empty
                    <tr class="text-center font-sans">
                        <td>Data tidak tersedia</td>
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
