@extends('template.master')
@section('tittle', 'Master Bahan')
@include('penjualan.penjualan-insert')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Penjualan <small>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus"></i>
                        add item</button>
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
                            <table id="datatable" class="table table-hover table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Customer</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Keterangan</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penjualan as $p)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $p->TanggalPenjualan }}</td>
                                            <td>{{ $p->NamaCustomer }}</td>
                                            <td>{{ $p->KodeProduk . ' - ' . $p->NamaProduk }}</td>
                                            <td>{{ $p->Qty }}</td>
                                            <td>{{ 'Rp. ' . number_format($p->Harga, 0, '', '.') }}</td>
                                            <td>{{ $p->Keterangan }}</td>
                                            <td>{{ 'Rp. ' . number_format($p->Total, 0, '', '.') }}</td>
                                            @if ($p->StatusTransaksi == 0)
                                                <td class="bg-danger text-light">Pending</td>
                                            @else
                                                <td class="bg-success text-light">Completed</td>
                                            @endif
                                            <td><a href="/penjualan/complete/{{$p->idPenjualan}}"><i class="fa fa-check"></i></a></td>
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
