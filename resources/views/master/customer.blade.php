@extends('template.master')
@section('tittle', 'Master Bahan')
@include('master.customer-insert')
@foreach ($data as $d)
    @include('master.customer-update')
@endforeach
@section('content')

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Customer <small>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                     data-target="#myModal">
                    <i class="fa fa-plus"></i> add item</button>
                </small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Diskon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $d->NamaCustomer }}</td>
                                            <td>{{ $d->DiskonCustomer }}</td>
                                            <td>
                                                <a type="button" data-toggle="modal"
                                                    data-target="#myModal{{ $d->idCustomer }}">
                                                    <i class="fa fa-edit text-primary"></i>
                                                </a>
                                                <a href="/master-customer/delete/{{ $d->idCustomer }}"
                                                    onclick="confirm('Apakah Anda Yakin Untuk Menghapus?')">
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
