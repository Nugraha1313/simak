@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0 bg-secondary" style="border-radius: 20px;">
              <div class="card-header border-0 pb-0" style="border-radius: 20px;">
                <h4>Update Data Mata Kuliah</h4>
              </div>
              <div class="card-body px-2 pt-0 pb-2">
                <div class="p-4 bg-secondary">
                  <form action="{{ route('mata-kuliah.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="form-control-label">Kode</label>
                          <input type="text" class="form-control form-control-alternative" name="kode_matkul" value="{{ old('kode_matkul') ? old('kode_matkul') : $item->kode_matkul }}" 
                          class="form-control form-control-alternative @error('kode_matkul') is-invalid @enderror">
                          @error('kode_matkul') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="form-control-label">Mata Kuliah</label>
                          <input type="text" class="form-control form-control-alternative" name="nama_matkul" value="{{ old('nama_matkul') ? old('nama_matkul') : $item->nama_matkul }}" 
                          class="form-control form-control-alternative @error('nama_matkul') is-invalid @enderror">
                          @error('nama_matkul') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="form-control-label">SKS</label>
                          <input type="text" class="form-control form-control-alternative" name="sks_matkul" value="{{ old('sks_matkul') ? old('sks_matkul') : $item->sks_matkul }}" 
                          class="form-control form-control-alternative @error('sks_matkul') is-invalid @enderror">
                          @error('sks_matkul') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Keterangan</label>
                          <select class="form-control @error('ket_matkul') is-invalid @enderror" id="exampleFormControlSelect1" name="ket_matkul">
                            <option value="{{ $item->ket_matkul }}">{{ $item->ket_matkul }}</option>
                            <option>Wajib</option>
                            <option>Pilihan</option>
                          </select>
                          @error('ket_matkul') <div class="text-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-10 ">
                        <a href="{{ route('mata-kuliah.index') }}" class="btn btn-success pull-left">
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
