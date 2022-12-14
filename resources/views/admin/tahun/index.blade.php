@extends('admin.layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 border-0" style="border-radius: 20px;">
            <div class="card-header border-0 pb-0" style="background-color: #fff; border-radius: 20px;">
                <h4>Data Tahun Akademik</h4>
            </div>
            <div class="card-body px-2 pt-0 pb-2">
                <div class="table-responsive p-4">
                <table class="table table-striped table-sm align-items-center mb-0" id="example">
                    <thead>
                        <tr>
                            <th class="text-center text-secondary text-s font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Tahun Akademik</th>
                            <th class="text-center text-secondary text-s font-weight-bolder opacity-7">Status</th>
                            <th class="text-center text-secondary text-s font-weight-bolder opacity-7">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center font-sans">
                            <td>1.</td>
                            <td>2021 Genap</td>
                            <td>
                                <i class="bi bi-x-circle-fill" style="color: #ea0606; font-size: 1.5rem;"></i>
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square text-light" style="font-size: .8rem;"></i>
                                </a>
                                <a href="" class="btn btn-sm" style="background-color: #ea0606;">
                                    <i class="bi bi-trash3 text-light" style="font-size: .8rem;"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="text-center font-sans">
                            <td>2.</td>
                            <td>2022 Gasal</td>
                            <td>
                                <i class="bi bi-check-circle-fill" style="color: #82d616; font-size: 1.5rem;"></i>
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square text-light" style="font-size: .8rem;"></i>
                                </a>
                                <a href="" class="btn btn-sm" style="background-color: #ea0606;">
                                    <i class="bi bi-trash3 text-light" style="font-size: .8rem;"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
