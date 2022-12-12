@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 border-0 bg-secondary" style="border-radius: 20px;">
                    <div class="card-header border-0 pb-0" style="border-radius: 20px;">
                        <h4>Add Data Jadwal Mata Kuliah</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Terjadi Kesalahan Saat Input
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="card-body px-2 pt-0 pb-2">
                            <div class="p-4 bg-secondary">
                                <form action="{{ route('kurikulum.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="fk_ta_jadwal" value="{{$tahun->id}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Mata Kuliah</label>
                                                <select class="form-control @error('fk_matkul_jadwal') is-invalid @enderror"
                                                    id="exampleFormControlSelect1" name="fk_matkul_jadwal">
                                                    <option>-- Pilih Mata Kuliah --</option>
                                                    @foreach ($matkul as $item)
                                                        <option value="{{ $item->id }}">{{ $item->kode_matkul }} |
                                                            {{ $item->nama_matkul }} | {{ $item->sks_matkul }} SKS</option>
                                                    @endforeach
                                                </select>
                                                @error('fk_matkul_jadwal')
                                                    <div class="form-control-muted">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Dosen</label>
                                                <select class="form-control @error('fk_dosen_jadwal') is-invalid @enderror"
                                                    id="exampleFormControlSelect1" name="fk_dosen_jadwal">
                                                    <option>-- Pilih Dosen --</option>
                                                    @foreach ($dosen as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_dosen }}</option>
                                                    @endforeach
                                                </select>
                                                @error('fk_dosen_jadwal')
                                                    <div class="form-control-muted">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Hari</label>
                                                <select class="form-control @error('hari_jadwal') is-invalid @enderror"
                                                    id="exampleFormControlSelect1" name="hari_jadwal">
                                                    <option>-- Pilih Hari --</option>
                                                    @foreach ($haris as $hari)
                                                        <option value="{{ $hari }}">{{ $hari }}</option>
                                                    @endforeach
                                                </select>
                                                @error('hari_jadwal')
                                                    <div class="form-control-muted">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="form-control-label">Waktu</label>
                                                <input type="text" class="form-control form-control-alternative"
                                                    name="waktu_jadwal" value="{{ old('waktu_jadwal') }}"
                                                    class="form-control form-control-alternative @error('waktu_jadwal') is-invalid @enderror">
                                                @error('waktu_jadwal')
                                                    <div class="form-control-muted">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Ruangan</label>
                                                <select
                                                    class="form-control @error('fk_ruangan_jadwal') is-invalid @enderror"
                                                    id="exampleFormControlSelect1" name="fk_ruangan_jadwal">
                                                    <option>-- Pilih Ruangan --</option>
                                                    @foreach ($ruangan as $item)
                                                        <option value="{{ $item->id }}">{{ $item->kode_ruangan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('fk_ruangan_jadwal')
                                                    <div class="form-control-muted">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Tambahan aulia --}}
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Tahun Akademik</label>
                                                <select
                                                    class="form-control @error('fk_ta_jadwal') is-invalid @enderror"
                                                    id="exampleFormControlSelect1" name="fk_ta_jadwal">
                                                    <option>-- Pilih Tahun Akadmeik --</option>
                                                        <option value="{{ $tahun->id }}">{{ $tahun->kode_tahunakademik }}
                                                        </option>
                                                </select>
                                                @error('fk_ta_jadwal')
                                                    <div class="form-control-muted">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-10 ">
                                            <a href="{{ route('kurikulum.index') }}" class="btn btn-success pull-left">
                                                <i class="fa fa-arrow-left"></i>
                                            </a>
                                            &nbsp;
                                            <button type="submit" class="btn btn-primary pull-right">Add</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
