<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keterangan;
use App\Models\Penjualan;
use App\Models\Customer;
use App\Models\Produk;
use App\Models\Resep;

class CPenjualan extends Controller
{
    public function data()
    {
        $penjualan  = Penjualan::select('customer.*', 'produk.*', 'keterangan.Keterangan', 'penjualan.*')
            ->join('customer', 'CustomerId', '=', 'idCustomer')
            ->join('produk', 'ProdukId', '=', 'idProduk')
            ->join('keterangan', 'KeteranganId', '=', 'id')
            ->get();
        return view('penjualan.laporan', [
            'datas'   => $penjualan
        ]);
    }

    public function index()
    {
        $customer   = Customer::all();
        $keterangan = Keterangan::all();
        $produk     = Produk::all();
        $penjualan  = Penjualan::select('customer.*', 'produk.*', 'keterangan.Keterangan', 'penjualan.*')
            ->join('customer', 'CustomerId', '=', 'idCustomer')
            ->join('produk', 'ProdukId', '=', 'idProduk')
            ->join('keterangan', 'KeteranganId', '=', 'id')
            ->get();

        //return $penjualan;

        return view('penjualan.index', [
            'customer'   => $customer,
            'keterangan' => $keterangan,
            'produk'     => $produk,
            'penjualan'  => $penjualan
        ]);
    }

    public function create()
    {
        //
    }


    public function store(Request $r)
    {
        //return $r->input();

        for ($i = 0; $i < count($r->produk); $i++) {

            $hpp = Produk::join('resep', 'idProduk', '=', 'ProdukId')
                ->join('bahan', 'idBahan', '=', 'BahanId')
                ->where('ProdukId', $r->produk[$i])->get();

            $ket = Keterangan::find($r->keterangan);

            $harga = $hpp[0]->BiayaLabor + $hpp[0]->Packaging + $hpp[0]->Sticker;

            foreach ($hpp as $h) {
                $harga += ($h->HargaBahan / $h->BobotBahan) * $h->Kuantitas;
            }

            $penjualan = new Penjualan();

            $penjualan->TanggalPenjualan = $r->tanggal;
            $penjualan->CustomerId       = $r->customer;
            $penjualan->ProdukId         = $r->produk[$i];
            $penjualan->Qty              = $r->jumlah[$i];
            $penjualan->KeteranganId     = $r->keterangan;
            $penjualan->Harga            = $harga;
            $penjualan->Total            = (($ket->Harga / 100) * $harga) * $r->jumlah[$i];
            $penjualan->StatusTransaksi  = 0;

            $penjualan->save();
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $penj = Penjualan::find($id);
        $penj->StatusTransaksi = 1;
        $penj->save();

        return redirect('/penjualan');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
