<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="{{ asset('landingpage/img/favicon.png') }}" rel="icon">
  <title>Dashboard | SIMAK</title>

  <!--     Fonts and icons     -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> --}}
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Nucleo Icons -->
  <link href="{{asset('admin/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/css/nucleo-svg.css')}} " rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="  https://kit.fontawesome.com/42d5adcbca.js " crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <!-- Bootstrap Icons -->
  <link href="{{ asset('landingpage/vendor-lp/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('admin/css/soft-ui-dashboard.css?v=1.0.6')}}" rel="stylesheet" />

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

</head>

<body class="g-sidenav-show bg-gray-100">
  @include('sweetalert::alert')

  @include('mahasiswa.layouts.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('mahasiswa.layouts.navbar')
    <!-- End Navbar -->

    @yield('content')
  </main>

  <!--   Core JS Files   -->
  <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}"></script>
  <script src="{{ asset('admin/js/plugins/Chart.extension.js') }}"></script>
  <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  
  <!-- DataTables -->
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#example').DataTable({
        pagingType: 'numbers',
        info: false,
      });
    });
  </script>

  {{-- sweetalert --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
  <script>
    $('body').on('click', '.trashData', function(e) {
        e.preventDefault();
        var action = $(this).data('action');
        Swal.fire({
          title: 'Apa Kamu Yakin?',
          text: "Anda Tidak Dapat Mengembalikannya Kembali!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus Itu!',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Dihapus!',
              'Data Telah Dihapus.',
              'success'
            )
          }
        })
    })
  </script>


  <!-- Github buttons -->
  {{-- <script async defer src=" {{asset('https://buttons.github.io/buttons.js')}} "></script> --}}
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  {{-- <script src="  {{asset('../dashboard/js/soft-ui-dashboard.min.js?v=1.0.6')}} "></script> --}}
</body>

</html>
