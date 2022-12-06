@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="card mb-4 border-0" style="border-radius: 20px;">
        <div class="card-header border-0 pb-0" style="border-radius: 20px; background-color: white">
            <h4>Detail Data Dosen</h4>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive p-4">
                    <div class="row me-1" style="float: left">
                        <div class="col-md-4">
                            @empty($item->foto_dosen)
                                <img 
                                    src="{{ asset('admin/img/profile/nophoto.png') }}" 
                                    style="height: 15rem; width: 15rem" 
                                    alt="{{ $item->nama_dosen }}">
                                @else
                                <img 
                                    src="{{ asset('admin/img/profile/dosen') }}/{{ $item->foto_dosen }}" 
                                    style="height: 15rem; width: 15rem" 
                                    alt="{{ $item->nama_dosen }}">
                            @endempty
                        </div>
                    </div>
                    <table class="table table-sm align-items-center mb-0" style="width: 40%">
                        <tr style="font-size: .9rem;">
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{ $item->nip_dosen }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $item->nama_dosen }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Tempat, Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $item->tmp_dosen }}, {{ date('d-m-Y', strtotime($item->tgl_dosen)) }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $item->gender_dosen }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $item->alamat_dosen }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{ $item->agama_dosen }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Program Studi</td>
                            <td>:</td>
                            <td>{{ $item->prodi_dosen }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>No. Hp</td>
                            <td>:</td>
                            <td>{{ $item->telp_dosen }}</td>
                        </tr>
                        <tr style="font-size: .9rem;">
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $item->email_dosen }}</td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-8">
                            <a href="{{ route('dosen.index') }}" class="btn btn-success pull-left">
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
