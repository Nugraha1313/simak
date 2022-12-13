<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jadwal-Mengajar-{{ $item->nip_dosen }}-NFComputer</title>
  <style>
    .slice {
      border: 1px solid rgb(155, 154, 154);
    }
    .text-start {
      text-align: left !important;
    }

    .text-center {
      text-align: center !important;
    }

    .mb-5 {
      margin-bottom: 3rem;
    }
  </style>
</head>
<body>
  <h3 class="text-center mb-5">Jadwal Mengajar</h3>
  <table border="1" align="center" cellpadding="3" cellspacing="0" width="100%">
    <thead>
      <tr class="slice">
        <th class="text-center slice">#</th>
        <th class="text-center slice">Hari</th>
        <th class="text-center slice">Waktu</th>
        <th class="text-center slice">Mata Kuliah</th>
        <th class="text-center slice">Ruangan</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($datas as $index => $data)
      <tr class="text-center" style="font-size: .9rem;">
        <td>{{ $index+1 }}</td>
        <td>{{ $data->hari_jadwal }}</td>
        <td>{{ $data->waktu_jadwal }}</td>
        <td class="text-start">{{ $data->matkul->nama_matkul }}</td>
        <td>{{ $data->ruangan->kode_ruangan }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</body>
</html>