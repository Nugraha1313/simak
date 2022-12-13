@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0 bg-secondary" style="border-radius: 20px;">
              <div class="card-header border-0 pb-0" style="border-radius: 20px;">
                <h4>Update Data Dosen/Tendik</h4>
              </div>
              <div class="card-body px-2 pt-0 pb-2">
                <div class="p-4 bg-secondary">
                  <form action="{{ route('dosen.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">NIP</label>
                          <input type="text" class="form-control form-control-alternative" name="nip_dosen" value="{{ old('nip_dosen') ? old('nip_dosen') : $item->nip_dosen }}" 
                          class="form-control form-control-alternative @error('nip_dosen') is-invalid @enderror">
                          @error('nip_dosen') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Nama</label>
                          <input type="text" class="form-control form-control-alternative" name="nama_dosen" value="{{ old('nama_dosen') ? old('nama_dosen') : $item->nama_dosen }}" 
                          class="form-control form-control-alternative @error('nama_dosen') is-invalid @enderror">
                          @error('nama_dosen') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Password</label>
                          <input type="password" class="form-control form-control-alternative" name="password" value="" 
                          class="form-control form-control-alternative @error('password') is-invalid @enderror">
                          @error('password') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Confirm Password</label>
                          <input type="password" class="form-control form-control-alternative" name="password_confirmation" value="" 
                          class="form-control form-control-alternative @error('password_confirmation') is-invalid @enderror">
                          @error('password2') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Tempat Lahir</label>
                          <input type="text" class="form-control form-control-alternative" name="tmp_dosen" value="{{ old('tmp_dosen') ? old('tmp_dosen') : $item->tmp_dosen }}" 
                          class="form-control form-control-alternative @error('tmp_dosen') is-invalid @enderror">
                          @error('tmp_dosen') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Tanggal Lahir</label>
                          <input type="date" class="form-control form-control-alternative" name="tgl_dosen" value="{{ old('tgl_dosen') ? old('tgl_dosen') : $item->tgl_dosen }}" 
                          class="form-control form-control-alternative @error('tgl_dosen') is-invalid @enderror">
                          @error('tgl_dosen') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Alamat</label>
                          <input type="text" class="form-control form-control-alternative" name="alamat_dosen"value="{{ old('alamat_dosen') ? old('alamat_dosen') : $item->alamat_dosen }}" 
                          class="form-control form-control-alternative @error('alamat_dosen') is-invalid @enderror">
                          @error('alamat_dosen') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Prodi</label>
                          <input type="text" class="form-control form-control-alternative" name="prodi_dosen"value="{{ old('prodi_dosen') ? old('prodi_dosen') : $item->prodi_dosen }}" 
                          class="form-control form-control-alternative @error('prodi_dosen') is-invalid @enderror">
                          @error('prodi_dosen') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="form-control-label">Agama</label>
                          <input type="text" class="form-control form-control-alternative" name="agama_dosen" value="{{ old('agama_dosen') ? old('agama_dosen') : $item->agama_dosen }}" 
                          class="form-control form-control-alternative @error('agama_dosen') is-invalid @enderror">
                          @error('agama_dosen') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="form-control-label">No. Hp</label>
                          <input type="text" class="form-control form-control-alternative" name="telp_dosen" value="{{ old('telp_dosen') ? old('telp_dosen') : $item->telp_dosen }}" 
                          class="form-control form-control-alternative @error('telp_dosen') is-invalid @enderror">
                          @error('telp_dosen') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="form-control-label">Email</label>
                          <input type="email_dosen" class="form-control form-control-alternative" name="email_dosen" value="{{ old('email_dosen') ? old('email_dosen') : $item->email_dosen }}" 
                          class="form-control form-control-alternative @error('email_dosen') is-invalid @enderror">
                          @error('email_dosen') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 jk">
                        <div class="form-group">
                          <label class="form-control-label">Jenis Kelamin</label><br>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender_dosen" id="inlineRadio1" value="Laki-laki" {{ $item->gender_dosen == 'Laki-laki' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="inlineRadio1">Laki-laki</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender_dosen" id="inlineRadio2" value="Perempuan" {{ $item->gender_dosen == 'Perempuan' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="inlineRadio2">Perempuan</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Photo</label>
                          <input type="file" class="form-control form-control-alternative-file" id="exampleFormControlFile1" name="foto_dosen">
                          {{-- <img src="{{asset('admin/img/profile/dosen')}}/{{$item->foto_dosen}} ? {{asset('admin/img/profile/dosen')}}/{{$item->foto_dosen}} : {{asset('admin/img/profile/nophoto.png')}}" width="100" height="100" alt="No image" class="img-thumbnail gambar"> --}}
                          @empty($item->foto_dosen)
                            <img 
                              src="{{ asset('admin/img/profile/nophoto.png') }}" 
                              style="height: 5rem; margin-top: 1rem;" 
                              class="img-thumbnail gambar"
                              alt="{{ $item->nama_dosen }}">
                            @else
                            <img 
                              src="{{ asset('admin/img/profile/dosen') }}/{{ $item->foto_dosen }}" 
                              style="height: 5rem;  margin-top: 1rem;" 
                              class="img-thumbnail gambar"
                              alt="{{ $item->nama_dosen }}">
                          @endempty
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-10 ">
                        <a href="{{ route('dosen.index') }}" class="btn btn-success pull-left">
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
