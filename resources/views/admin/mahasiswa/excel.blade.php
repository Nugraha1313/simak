<table>
  <thead>
    <tr>
      <th>No</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Agama</th>
      <th>Program Studi</th>
      <th>No. Hp</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    @php
        $no = 1;
    @endphp
    @foreach ($mahasiswas as $mahasiswa)
      <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $mahasiswa->nim_mahasiswa }}</td>
        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
        <td>{{ $mahasiswa->gender_mahasiswa }}</td>
        <td>{{ $mahasiswa->agama_mahasiswa }}</td>
        <td>{{ $mahasiswa->prodi_mahasiswa }}</td>
        <td>{{ $mahasiswa->telp_mahasiswa }}</td>
        <td>{{ $mahasiswa->email_mahasiswa }}</td>
      </tr>
    @endforeach
  </tbody>
</table>