@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0" style="border-radius: 20px;">
                <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
                    <div class="col">
                        <a type="submit" href="{{ route('dosen.create') }}" class="btn btn-primary pull-right me-2">Add</a>
                        <a href="{{ route('dosen.export') }}" class="btn text-white" style="background-color: #0be61e">
                            <i class="fas fa-file-excel"></i>
                            <span style="font-size: .9rem;">Export</span>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <h4>Data Dosen/Tendik</h4>
                </div>
                <div class="card-body px-2 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table class="table table-striped table-border align-items-center mb-0" id="example">
                            <thead>
                            <tr>
                                <th class="text-center text-secondary text-s font-weight-bolder opacity-7">No.</th>
                                <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Foto</th>
                                <th class="text-center text-secondary text-s font-weight-bolder opacity-7">NIP</th>
                                <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Nama</th>
                                <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Jenis Kelamin</th>
                                <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Program Studi</th>
                                {{-- <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Email</th> --}}
                                {{-- <th class="text-center text-secondary text-s font-weight-bolder opacity-7">TTL</th>
                                <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Alamat</th> --}}
                                <th class="text-center text-secondary text-s font-weight-bolder opacity-7">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no= 1; @endphp
                            @forelse ($items as $item)    
                                <tr class="text-center font-sans">
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        @empty($item->foto_dosen)
                                            <img 
                                                src="{{ asset('admin/img/profile/nophoto.png') }}" 
                                                style="height: 5rem;" 
                                                alt="{{ $item->nama_dosen }}">
                                            @else
                                            <img 
                                                src="{{ asset('admin/img/profile/dosen') }}/{{ $item->foto_dosen }}" 
                                                style="height: 5rem;" 
                                                alt="{{ $item->nama_dosen }}">
                                        @endempty
                                    </td>
                                    <td>{{ $item->nip_dosen }}</td>
                                    <td>{{ $item->nama_dosen }}</td>
                                    <td>{{ $item->gender_dosen }}</td>
                                    <td>{{ $item->prodi_dosen }}</td>
                                    <td>
                                        <a href="{{ route('dosen.show', $item->id) }}" class="btn btn-sm" style="background-color: #17c1e8;">
                                            <i class="bi bi-eye text-light" style="font-size: .8rem;"></i>
                                        </a>
                                        <a href="{{ route('dosen.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square text-light" style="font-size: .8rem;"></i>
                                        </a>
                                        <form action="{{ route('dosen.destroy', $item->id) }}" 
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
                                    <td>
                                        Data tidak tersedia
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
