@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0" style="border-radius: 20px;">
            <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
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
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Gender</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Email</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Tempat</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Tanggal</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Alamat</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">AKSI</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $no= 1; @endphp
                        @foreach ($dosen as $row)
                        <tr class="text-center font-sans">
                            <td scope="row">{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('dashboard/img/team-1.jpg') }}" style="height: 5rem;" alt="{{$row->foto_dosen}}">
                            </td>
                            <td>{{$row->nip_dosen}}</td>
                            <td>{{$row->nama_dosen}}</td>
                            <td>{{$row->gender_dosen}}</td>
                            <td>{{$row->email_dosen}}</td>
                            <td>{{$row->tmp_dosen}}</td>
                            <td>{{$row->tgl_dosen}}</td>
                            <td>{{$row->alamat_dosen}}</td>
                            <td>
                                <a href="{{ url('dosen.show', $row->id) }}" class="btn btn-sm" style="background-color: #17c1e8;">
                                    <i class="bi bi-eye text-light" style="font-size: .8rem;"></i>
                                </a>
                                <a href="" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square text-light" style="font-size: .8rem;"></i>
                                </a>
                                <a href="" class="btn btn-sm" style="background-color: #ea0606;">
                                    <i class="bi bi-trash3 text-light" style="font-size: .8rem;"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection



