<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jadwal-Perkuliahanr-{{ $mahasiswa->nim_mahasiswa }}-NFComputer</title>
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
  <h3 class="text-center mb-5">Jadwal Perkuliahan</h3>
  <table border="1" class="slice" align="center" cellpadding="3" cellspacing="0" width="100%">
    <thead>
      <tr class="slice">
        <th class="text-center">#</th>
        <th class="text-center">Hari</th>
        <th class="text-center">Waktu</th>
        <th class="text-center">Mata Kuliah</th>
        <th class="text-center">Dosen</th>
        <th class="text-center">Ruangan</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($items as $index => $item)
      <tr class="text-center font-sans" style="font-size: .9rem;">
        <td>{{ $index+1 }}</td>
        <td>{{ $item->jadwal['hari_jadwal'] }}</td>
        <td>{{ $item->jadwal['waktu_jadwal'] }}</td>
        <td>{{ $item->jadwal['matkul']['nama_matkul'] }}</td>
        <td>{{ $item->jadwal['dosen']['nama_dosen'] }}</td>
        <td>{{ $item->jadwal['ruangan']['kode_ruangan'] }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</body>
</html>