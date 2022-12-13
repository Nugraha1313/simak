<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRS-{{ $mahasiswa->nim_mahasiswa }}-NFComputer</title>
    <link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <style>
        span {
          font-size: 12.5px;
          font-weight: bold;
        }

        /* svg {
          vertical-align: middle;
        } */

        .slice {
          border: 1px solid rgb(199, 197, 197);
        }

        /* .slice-k {
          border-top: 1px solid rgb(199, 197, 197) !important;
        } */
        
        /* .text-start {
          text-align: left !important;
        }

        .text-center {
          text-align: center !important;
        }

        .text-end {
          text-align: right !important;
        }

        .mb-5 {
          margin-bottom: 3rem;
        }

        .mt-5 {
          margin-top: 3rem;
        }

        .fst-italic {
          font-style: italic;
        }

        table {
          caption-side: bottom;
          border-collapse: collapse;
        }

        th {
          text-align: inherit;
          text-align: -webkit-match-parent;
        }

        thead,
        tbody,
        tfoot,
        tr,
        td,
        th {
          border-color: inherit;
          border-style: solid;
          border-width: 0;
        }

        img {
          vertical-align: middle;
        } */
      </style>
  </head>
  <body>
    <div class="container-sm mt-2 text-center ms-8 me-8">
      <div class="row justify-content-center">
        <table border="0" align="center" cellpadding="0" width="100%">
          <tr>
            <td rowspan="2">
              <a class="navbar-brand align-items-center" href="#" 
                style="color: rgba(1, 4, 136, 0.9)">
                <i class="fas fa-graduation-cap fs-1"></i>
                <span class="ms-1 fs-1 fw-bold">SIMAK</span>
              </a>
              {{-- <img src="https://media.discordapp.net/attachments/894919708938223657/1051113327192965230/IMG_20221210_192810_769.jpg" alt="logo"> --}}
              {{-- <img src="{{ public_path('simak.svg') }}" alt="logo" style="width: 300px; height: 200px;"> --}}
              {{-- <img src="{{ storage_path('app/img/simak.svg') }}" alt="logo"> --}}
            </td>
            <td class="text-center">
              <h2>NF COMPUTER</h2>
            </td>
          </tr>
          <tr>
            <td class="text-center">
              <span>Jl. Lenteng Agung Raya No. 20-21, Srengseng Sawah - Jagakarsa, Jakarta Selatan 12640</span><br>
              <span>Telp. +62-21- 7874223, 7874224, Fax. +62-21-7874225, Email: info@nurulfikri.co.id</span>
            </td>
          </tr>
        </table>
        <hr style="height: 2px; border-width: 0; color:black; background-color:black">
      </div>
      <div class="row mb-3 mt-2">
        <div class="col-md-12">
          <h4 class="text-center">KARTU RENCANA STUDI</h4>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-md-12">
          <table border="0" align="center" cellpadding="1" width="100%">
            <tr class="fst-italic">
              <th class="text-start">Mahasiswa</th>
              <td>:</td>
              <td class="text-start">&nbsp;&nbsp;{{ $mahasiswa->nama_mahasiswa }}</td>
              <th class="text-start">Semester</th>
              <td>:</td>
              <td class="text-start">&nbsp;&nbsp;{{ $ta->kode_tahunakademik }}</td>
            </tr>
            <tr class="fst-italic">
              <th class="text-start">NIM</th>
              <td>:</td>
              <td class="text-start">&nbsp;&nbsp;{{ $mahasiswa->nim_mahasiswa }}</td>
              <th class="text-start">Program Studi</th>
              <td>:</td>
              <td class="text-start">&nbsp;&nbsp;{{ $mahasiswa->prodi_mahasiswa }}</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <table class="slice" align="center" cellpadding="3" cellspacing="0" width="100%">
          <thead>
            <tr class="slice" style="background-color: rgb(223, 223, 223);">
              <th class="text-center slice">#</th>
              <th class="text-center slice">Hari</th>
              <th class="text-center slice">Jam Kuliah</th>
              <th class="text-center slice">Mata Kuliah</th>
              <th class="text-center slice">SKS</th>
              <th class="text-center slice">Dosen</th>
              <th class="text-center slice">Ruang</th>
            </tr>
          </thead>
          <tbody>
          @forelse ($items as $index => $item)
            <tr class="slice">
              <td class="slice text-center">{{ $index+1 }}</td>
              <td class="slice text-center">{{ $item->jadwal->hari_jadwal }}</td>
              <td class="slice text-start">{{ $item->jadwal->waktu_jadwal }}</td>
              <td class="slice text-center">{{ $item->jadwal->matkul->nama_matkul }}</td>
              <td class="slice text-center">{{ $item->jadwal->matkul->sks_matkul }}</td>
              <td class="slice text-center">{{ $item->jadwal->dosen->nama_dosen }}</td>
              <td class="slice text-center">{{ $item->jadwal->ruangan->kode_ruangan }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center">
                Belum mengambil KRS
              </td>
            </tr>
          @endforelse
          </tbody>
          <tfoot>
            <tr style="background-color: rgb(223, 223, 223); font-weight: bold;">
              <th class="text-end" colspan="4">Jumlah SKS yang diambil:&nbsp;&nbsp;</th>
              <th class="text-center">{{ $sumSks }}</th>
              <th colspan="2">&nbsp;</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="row mt-5">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <td>
              <table>
                <tr>
                  <td class="text-start">
                    Depok, {{ $tanggal }} <br>
                    Kepala Biro Administrasi Akademik <br><br><br><br><br>
                    <b>Grandy Prafatia, S.Kom</b><br>
                    NIP: 110220209
                  </td>
                </tr>
              </table>
            </td>
            <td>
              <table>
                <tr>
                  <td class="text-center">
                    Mahasiswa/i <br><br><br><br><br><br><br>
                    <b>{{ $mahasiswa->nama_mahasiswa }}</b><br>
                    NIM: {{ $mahasiswa->nim_mahasiswa }}
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <script>
      window.print();
    </script>
  </body>
</html>