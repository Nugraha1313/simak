<div class="card mb-4 border-0" style="border-radius: 20px;">
    <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
      <h4>Daftar Jadwal Perkuliahan</h4>
    </div>
    <div class="card-body px-2 pt-0 pb-2">
      <div class="table-responsive p-4">
        <table class="align-items-center mb-0" border="1" cellpadding="10">
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
            @foreach ($jadwal as $row)
            <tr class="text-center font-sans">
              <td>{{ $row->hari_jadwal }}</td>
              <td>{{ $row->waktu_jadwal }}</td>
              <td>{{ $row->matkul->nama_matkul }}</td>
              <td>{{ $row->dosen->nama_dosen }}</td>
              <td>{{ $row->ruangan->kode_ruangan }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>