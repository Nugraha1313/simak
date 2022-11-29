@extends('mahasiswa.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="card mb-4 border-0" style="border-radius: 20px;">
        <div class="row">
          <div class="col">
            <div class="table-responsive p-4">
              <table class="table table-sm align-items-center mb-0" style="width: 40%">
                <tr style="font-size: .9rem;">
                  <td rowspan="3">
                    <img src="{{ asset('public/dashboard/img/team-1.jpg') }}" style="height: 8rem; width:auto;" alt="">
                  </td>
                  <td>NIM</td>
                  <td>:</td>
                  <td>19051204039</td>
                </tr>
                <tr style="font-size: .9rem;">
                  <td>Nama</td>
                  <td>:</td>
                  <td>Cindy Viona</td>
                </tr>
                <tr style="font-size: .9rem;">
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td>Perempuan</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card mb-4 border-0" style="border-radius: 20px;">
          <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
            <h4>Semester 1</h4>
          </div>
          <div class="card-body px-2 pt-0 pb-2">
            <div class="table-responsive p-2">
              <table class="table table-sm table-striped align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">NO.</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Mata Kuliah</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">SKS</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Nilai</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Indeks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center font-sans" style="font-size: .9rem">
                    <td>1</td>
                    <td>Dasar Pemrograman</td>
                    <td>2</td>
                    <td>A</td>
                    <td>4.0</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 border-0" style="border-radius: 20px;">
          <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
            <h4>Rekap Aktivitas Mahasiswa</h4>
          </div>
          <div class="card-body px-2 pt-0 pb-2">
            <div class="table-responsive p-2">
              <table class="table table-sm table-striped align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Semester</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">IPS</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">SKS</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">IPK</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">SKS TT</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center font-sans" style="font-size: .9rem">
                    <th>Semester 1</th>
                    <td>4.0</td>
                    <td>2</td>
                    <td>4.0</td>
                    <td>2</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card mb-4 border-0" style="border-radius: 20px;">
          <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
            <h4>Semester 1</h4>
          </div>
          <div class="card-body px-2 pt-0 pb-2">
            <div class="table-responsive p-2">
              <table class="table table-sm table-striped align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">NO.</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Mata Kuliah</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">SKS</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Nilai</th>
                    <th class="text-center text-secondary text-xs font-weight-bolder opacity-7">Indeks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center font-sans" style="font-size: .9rem">
                    <td>1</td>
                    <td>Dasar Pemrograman</td>
                    <td>2</td>
                    <td>A</td>
                    <td>4.0</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection