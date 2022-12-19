<table>
  <thead>
    <tr>
      <th>No</th>
      <th>NIP</th>
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
    @foreach ($dosens as $dosen)
      <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $dosen->nip_dosen }}</td>
        <td>{{ $dosen->nama_dosen }}</td>
        <td>{{ $dosen->gender_dosen }}</td>
        <td>{{ $dosen->agama_dosen }}</td>
        <td>{{ $dosen->prodi_dosen }}</td>
        <td>{{ $dosen->telp_dosen }}</td>
        <td>{{ $dosen->email_dosen }}</td>
      </tr>
    @endforeach
  </tbody>
</table>