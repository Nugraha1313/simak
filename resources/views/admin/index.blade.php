@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
  <div class="row ms-1 me-1">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Mahasiswa</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $mahasiswa }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Dosen/Tendik</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $dosen }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Kurikulum</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $jadwal }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    {{-- chart --}}
    <div class="col-lg-5 mx-6">
      <div class="card border-radius-xl">
        <div class="card-body">
          <h5 class="card-title">Grafik Gender Dosen</h5>

          <!-- Doughnut Chart -->
          <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
          <script>
            let label = [@foreach($ar_gender_dosen as $g) '{{ $g->gender_dosen }}', @endforeach];
            let jumlah = [@foreach($ar_gender_dosen as $g) {{ $g->jumlah }}, @endforeach];
            document.addEventListener("DOMContentLoaded", () => {
              new Chart(document.querySelector('#doughnutChart'), {
                type: 'pie',
                data: {
                  labels: label,
                  datasets: [{
                    label: 'My First Dataset',
                    data: jumlah,
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                      'rgb(255, 99, 132)',
                      'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                  }]
                }
              });
            });
          </script>
          <!-- End Doughnut CHart -->

        </div>
      </div>
    </div>
    <div class="col-lg-5 ">
      <div class="card ">
        <div class="card-body">
          <h5 class="card-title">Grafik Gender Mahasiswa</h5>

          <!-- Doughnut Chart -->
          <canvas id="pieChart" style="max-height: 400px;"></canvas>
          <script>
            let label2 = [@foreach($ar_gender_mahasiswa as $g) '{{ $g->gender_mahasiswa }}', @endforeach];
            let jumlah2 = [@foreach($ar_gender_mahasiswa as $g) {{ $g->jumlah }}, @endforeach];
            document.addEventListener("DOMContentLoaded", () => {
              new Chart(document.querySelector('#pieChart'), {
                type: 'pie',
                data: {
                  labels: label2,
                  datasets: [{
                    label: 'My First Dataset',
                    data: jumlah2,
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                      'rgb(255, 99, 132)',
                      'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                  }]
                }
              });
            });
          </script>
          <!-- End Doughnut CHart -->

        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
