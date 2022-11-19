

@extends('admin.layouts.app')
@section('content')
<div class="col-12">
    <div class="card mb-4 border-0" style="border-radius: 20px;">
    <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
        <h4>Profile Dosen/Tendik</h4>
    </div>
    <div class="container-fluid py-4">
        @php $no= 1; @endphp
        @foreach ($dosen as $row)
        <div class="row">
          <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <img src="{{ asset('dashboard/img/team-1.jpg') }}" style="width: 10rem;" alt="{{$row->foto_dosen}}">
              </div>
            </div>
          </div>
          <div class="col-xl-7 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Dosen/Tendik</p>
                      <h5 class="font-weight-bolder mb-0">Dosen/Tandik</h5>
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
        </div>
        @endforeach
      </div> 
    </div>
</div>


@endsection