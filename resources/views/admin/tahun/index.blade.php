@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="col">
            <a type="submit" href="{{ route('tahun-akademik.create') }}" class="btn btn-primary pull-right">Add</a>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0" style="border-radius: 20px;">
            <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
                <h4>Data Tahun Akademik</h4>
            </div>
            <div class="card-body px-2 pt-0 pb-2">
                <div class="table-responsive p-4">
                <table class="table table-striped table-sm align-items-center mb-0" id="example">
                    <thead>
                        <tr>
                            <th class="text-center text-secondary text-s font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Tahun Akademik</th>
                            <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Status</th>
                            <th class="text-center text-secondary text-s font-weight-bolder opacity-7">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no= 1; @endphp
                    @forelse ($items as $item)
                        <tr class="text-center font-sans">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->kode_tahunakademik }}</td>
                            <td>
                                @if ($item->status_tahunakademik == 0)
                                    <i class="bi bi-x-circle-fill" style="color: #ea0606; 
                                    font-size: 1.5rem;"></i>
                                @else
                                    <i class="bi bi-check-circle-fill" style="color: #82d616; 
                                    font-size: 1.5rem;"></i>
                                @endif
                            </td>
                            <td>
                                @if ($item->status_tahunakademik == 0)
                                    <form action="{{ route('tahun-akademik.activeAyear', $item->id) }}" 
                                        method="post" class="d-inline">
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                    @csrf
                                        <button class="btn btn-sm"  style="background-color: #17c1e8;">
                                            <i class="text-light" style="font-size: .8rem;">Aktifkan</i>
                                        </button>
                                    </form>
                                @else
                                @endif
                                <a href="{{ route('tahun-akademik.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square text-light" style="font-size: .8rem;"></i>
                                </a>
                                <form action="{{ route('tahun-akademik.destroy', $item->id) }}" 
                                    method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm" style="background-color: #ea0606;" 
                                        onclick="return confirm('Anda Yakin akan Menghapus Data?')">
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
