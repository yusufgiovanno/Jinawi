@extends('template.master')
@section('tittle', 'Master Bahan')
@include('master.produk-insert')
@foreach ($data as $d)
    @include('master.produk-update')
@endforeach
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Daftar Produk <small>
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
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>HPP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    @php $biaya = $d->BiayaLabor + $d->Packaging +  $d->Sticker; @endphp
                                        @foreach($resep as $r)
                                            @if($r->ProdukId == $d->idProduk)
                                            @php
                                                $biaya += ($r->HargaBahan / $r->BobotBahan) * $r->Kuantitas;
                                            @endphp
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $d->KodeProduk }}</td>
                                            <td>{{ $d->NamaProduk }}</td>
                                            <td>RP. {{ number_format($biaya, 0, '', '.') }}</td>
                                            <td>
                                                <button class="btn"  data-toggle="modal" data-target="#myModal{{$d->idProduk}}">
                                                    <i class="fa fa-edit text-info"></i>
                                                </button>
                                                <a href="/master-produk/delete/{{ $d->idProduk }}"
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
