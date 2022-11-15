@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4 border-0" style="border-radius: 20px;">
          <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
            <h4>Kurikulum</h4>
          </div>
          <div class="card-body px-2 pt-0 pb-2">
            <div class="table-responsive p-4">
              <table class="table table-striped table-border align-items-center mb-0" id="example">
                <thead>
                    <tr>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7" rowspan="2">No.</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7" colspan="3">Mata Kuliah</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7" colspan="2">Jadwal</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7" rowspan="2">Pengajar</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7" rowspan="2">Ruangan</th>
                    </tr>
                    <tr>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Kode</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Nama</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">SKS</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Hari</th>
                        <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center font-sans">
                        <td>1.</td>
                        <td>MK01</td>
                        <td>Dasar Pemrograman</td>
                        <td>2</td>
                        <td>Senin</td>
                        <td>08.40-09.30</td>
                        <td>John Doe</td>
                        <td>A01</td>
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
