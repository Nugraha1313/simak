@extends('mahasiswa.layouts.app')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4 border-0" style="border-radius: 20px;">
        <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
          <h4>Daftar Jadwal Perkuliahan</h4>
        </div>
        <div class="card-body px-2 pt-0 pb-2">
          <div class="table-responsive p-4">
            <table class="table table-striped table-border align-items-center mb-0" id="example">
              <thead>
                <tr>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Hari</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Waktu</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Mata Kuliah</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Nama Pengajar</th>
                  <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Ruangan</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center font-sans">
                  <td>Senin</td>
                  <td>08.40-09.30</td>
                  <td>Dasar Pemrograman</td>
                  <td>John Doe</td>
                  <td>A01</td>
                </tr>
                {{-- <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">John Michael</h6>
                        <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">Manager</p>
                    <p class="text-xs text-secondary mb-0">Organization</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success">Online</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                  </td>
                  <td class="align-middle">
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                      Edit
                    </a>
                  </td>
                </tr> --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection