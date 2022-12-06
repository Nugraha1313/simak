@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="card mb-4 border-0" style="border-radius: 20px;">
        <div class="card-header border-0 pb-0" style="border-radius: 20px; background-color: white">
            <h4>Detail Data Mahasiswa</h4>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive p-4">
                    <div class="row me-1" style="float: left">
                        <div class="col-md-4">
                            @empty($item->foto_mahasiswa)
                                <img 
                                    src="{{ asset('admin/img/profile/nophoto.png') }}" 
                                    style="height: 15rem; width: 15rem" 
                                    alt="{{ $item->nama_mahasiswa }}">
                                @else
                                <img 
                                    src="{{ asset('admin/img/profile/mahasiswa') }}/{{ $item->foto_mahasiswa }}" 
                                    style="height: 15rem; width: 15rem" 
                                    alt="{{ $item->nama_mahasiswa }}">
                            @endempty
                        </div>
                    </div>
                    <table class="table table-sm align-items-center mb-0" style="width: 40%">
                        <tr style="font-size: .9rem;">
                            <td>NIM</td>
                            <td>:</td>
                            <td>{{ $item->nim_mahasiswa }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $item->nama_mahasiswa }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Tempat, Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $item->tmp_mahasiswa }}, {{ date('d-m-Y', strtotime($item->tgl_mahasiswa)) }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $item->gender_mahasiswa }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $item->alamat_mahasiswa }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{ $item->agama_mahasiswa }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Program Studi</td>
                            <td>:</td>
                            <td>{{ $item->prodi_mahasiswa }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>No. Hp</td>
                            <td>:</td>
                            <td>{{ $item->telp_mahasiswa }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $item->email_mahasiswa }}</td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-8">
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-success pull-left">
                            <i class="fa fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
