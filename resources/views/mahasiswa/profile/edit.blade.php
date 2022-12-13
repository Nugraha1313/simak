@extends('mahasiswa.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0 bg-secondary" style="border-radius: 20px;">
              <div class="card-header border-0 pb-0" style="border-radius: 20px;">
                <h4>Update Profile</h4>
              </div>
              <div class="card-body px-2 pt-0 pb-2">
                <div class="p-4 bg-secondary">
                  <form action="{{ route('updateProfile.mahasiswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">NIM</label>
                          <input type="text" class="form-control form-control-alternative" name="nim_mahasiswa" value="{{ $item->nim_mahasiswa }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Nama</label>
                          <input type="text" class="form-control form-control-alternative" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') ? old('nama_mahasiswa') : $item->nama_mahasiswa }}" 
                          class="form-control form-control-alternative @error('nama_mahasiswa') is-invalid @enderror">
                          @error('nama_mahasiswa') <div class="form-control-muted">{{ $message }}</div> @enderror
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
                          <input type="text" class="form-control form-control-alternative" name="tmp_mahasiswa" value="{{ old('tmp_mahasiswa') ? old('tmp_mahasiswa') : $item->tmp_mahasiswa }}" 
                          class="form-control form-control-alternative @error('tmp_mahasiswa') is-invalid @enderror">
                          @error('tmp_mahasiswa') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Tanggal Lahir</label>
                          <input type="date" class="form-control form-control-alternative" name="tgl_mahasiswa" value="{{ old('tgl_mahasiswa') ? old('tgl_mahasiswa') : $item->tgl_mahasiswa }}" 
                          class="form-control form-control-alternative @error('tgl_mahasiswa') is-invalid @enderror">
                          @error('tgl_mahasiswa') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Alamat</label>
                          <input type="text" class="form-control form-control-alternative" name="alamat_mahasiswa"value="{{ old('alamat_mahasiswa') ? old('alamat_mahasiswa') : $item->alamat_mahasiswa }}" 
                          class="form-control form-control-alternative @error('alamat_mahasiswa') is-invalid @enderror">
                          @error('alamat_mahasiswa') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Prodi</label>
                          <input type="text" class="form-control form-control-alternative" name="prodi_mahasiswa" value="{{ $item->prodi_mahasiswa }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="form-control-label">Agama</label>
                          <input type="text" class="form-control form-control-alternative" name="agama_mahasiswa" value="{{ old('agama_mahasiswa') ? old('agama_mahasiswa') : $item->agama_mahasiswa }}" 
                          class="form-control form-control-alternative @error('agama_mahasiswa') is-invalid @enderror">
                          @error('agama_mahasiswa') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="form-control-label">No. Hp</label>
                          <input type="text" class="form-control form-control-alternative" name="telp_mahasiswa" value="{{ old('telp_mahasiswa') ? old('telp_mahasiswa') : $item->telp_mahasiswa }}" 
                          class="form-control form-control-alternative @error('telp_mahasiswa') is-invalid @enderror">
                          @error('telp_mahasiswa') <div class="form-control-muted">{{ $message }}</div> @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="form-control-label">Email</label>
                          <input type="email_mahasiswa" class="form-control form-control-alternative" name="email_mahasiswa" value="{{ $item->email_mahasiswa }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 jk">
                        <div class="form-group">
                          <label class="form-control-label">Jenis Kelamin</label><br>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender_mahasiswa" id="inlineRadio1" value="Laki-laki" {{ $item->gender_mahasiswa == 'Laki-laki' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="inlineRadio1">Laki-laki</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender_mahasiswa" id="inlineRadio2" value="Perempuan" {{ $item->gender_mahasiswa == 'Perempuan' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="inlineRadio2">Perempuan</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Photo</label>
                          <input type="file" class="form-control form-control-alternative-file" id="exampleFormControlFile1" name="foto_mahasiswa">
                          @empty($item->foto_mahasiswa)
                            <img 
                              src="{{ asset('admin/img/profile/nophoto.png') }}" 
                              style="height: 5rem; margin-top: 1rem;" 
                              class="img-thumbnail gambar"
                              alt="{{ $item->nama_mahasiswa }}">
                            @else
                            <img 
                              src="{{ asset('admin/img/profile/mahasiswa') }}/{{ $item->foto_mahasiswa }}" 
                              style="height: 5rem;  margin-top: 1rem;" 
                              class="img-thumbnail gambar"
                              alt="{{ $item->nama_mahasiswa }}">
                          @endempty
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-10 ">
                        <a href="{{ route('profile.mahasiswa') }}" class="btn btn-success pull-left">
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
