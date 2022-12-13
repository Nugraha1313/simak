@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0 bg-secondary" style="border-radius: 20px;">
              <div class="card-header border-0 pb-0" style="border-radius: 20px;">
                <h4>Update Data Kurikulum</h4>
              </div>
              <div class="card-body px-2 pt-0 pb-2">
                <div class="p-4 bg-secondary">
                  <form action="{{ route('kurikulum.update', $item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Mata Kuliah</label>
                            <select class="form-control @error('fk_matkul_jadwal') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_matkul_jadwal">
                              @foreach ($matkul as $item_matkul)
                                @if ($item->fk_matkul_jadwal == $item_matkul->id)
                                  <option value="{{ $item_matkul->id }}" selected>{{$item_matkul->kode_matkul}} | {{ $item_matkul->nama_matkul }} | {{$item_matkul->sks_matkul}} SKS</option>
                                  @else
                                    <option value="{{ $item_matkul->id }}">{{$item_matkul->kode_matkul}} | {{ $item_matkul->nama_matkul }} | {{$item_matkul->sks_matkul}} SKS</option>
                                @endif
                              @endforeach
                            </select>
                          @error('fk_matkul_jadwal') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Dosen</label>
                            <select class="form-control @error('fk_dosen_jadwal') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_dosen_jadwal">
                              @foreach ($dosen as $item_dosen)
                                @if ($item->fk_dosen_jadwal == $item_dosen->id)
                                  <option value="{{ $item_dosen->id }}" selected>{{ $item_dosen->nama_dosen }}</option>
                                  @else
                                  <option value="{{ $item_dosen->id }}">{{ $item_dosen->nama_dosen }}</option>
                                @endif
                              @endforeach
                            </select>
                            @error('fk_dosen_jadwal') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Hari</label>
                            <select class="form-control @error('hari_jadwal') is-invalid @enderror" id="exampleFormControlSelect1" name="hari_jadwal">
                              @foreach ($haris as $hari)
                              @if ($item->hari_jadwal == $hari)
                                <option value="{{ $hari }}" selected>{{ $hari }}</option>
                                @else
                                <option value="{{ $hari }}">{{ $hari }}</option>
                              @endif
                              @endforeach
                            </select>
                            @error('hari_jadwal') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="form-control-label">Waktu</label>
                          <input type="text" class="form-control form-control-alternative" name="waktu_jadwal" value="{{ old('waktu_jadwal') ? old('waktu_jadwal') : $item->waktu_jadwal }}" 
                          class="form-control form-control-alternative @error('waktu_jadwal') is-invalid @enderror">
                          @error('waktu_jadwal') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Ruangan</label>
                            <select class="form-control @error('fk_ruangan_jadwal') is-invalid @enderror" id="exampleFormControlSelect1" name="fk_ruangan_jadwal">
                              @foreach ($ruangan as $item_ruangan)
                                @if ($item->fk_ruangan_jadwal == $item_ruangan->id)
                                  <option value="{{ $item_ruangan->id }}">{{ $item_ruangan->kode_ruangan }}</option>
                                @else
                                  <option value="{{ $item_ruangan->id }}">{{ $item_ruangan->kode_ruangan }}</option>
                                @endif
                              @endforeach
                            </select>
                            @error('fk_ruangan_jadwal') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-10 ">
                        <a href="{{ route('kurikulum.index') }}" class="btn btn-success pull-left">
                          <i class="fa fa-arrow-left"></i>
                        </a>
                        &nbsp;
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
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
