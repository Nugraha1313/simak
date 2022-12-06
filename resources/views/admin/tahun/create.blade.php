@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0 bg-secondary" style="border-radius: 20px;">
              <div class="card-header border-0 pb-0" style="border-radius: 20px;">
                <h4>Add Data Tahun Akademik</h4>
              </div>
              <div class="card-body px-2 pt-0 pb-2">
                <div class="p-4 bg-secondary">
                  <form action="{{ route('tahun-akademik.store') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Tahun Akademik</label>
                          <input type="text" class="form-control form-control-alternative" name="kode_tahunakademik" value="{{ old('kode_tahunakademik') }}" 
                          class="form-control form-control-alternative @error('kode_tahunakademik') is-invalid @enderror">
                          @error('kode_tahunakademik') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-10 ">
                        <a href="{{ route('tahun-akademik.index') }}" class="btn btn-success pull-left">
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
