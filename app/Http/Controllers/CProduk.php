<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keterangan;
use App\Models\Produk;
use App\Models\Bahan;
use App\Models\Resep;

class CProduk extends Controller
{

    public function index()
    {
        $resep = Resep::join('bahan', 'idBahan', '=', 'BahanId')
        ->orderBy('idResep')->get();

        $data  = Produk::all();

        $bahan = Bahan::all();
        $ket   = Keterangan::all();

        //return $resep;

        return view('master.produk',[
            'data'       => $data,
            'bahan'      => $bahan,
            'keterangan' => $ket,
            'resep'      => $resep
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $r)
    {
        //return $r->input();

        $prod = new Produk();
        $prod->KodeProduk   = $r->kode;
        $prod->NamaProduk   = $r->nama;
        $prod->BiayaLabor   = $r->labor;
        $prod->Packaging    = $r->packaging;
        $prod->Sticker      = $r->sticker;

        $prod->save();

        for ($i = 0; $i<count($r->bahan); $i++){
            $resep = new Resep();
            $resep->ProdukId  = $prod->idProduk;
            $resep->BahanId   = $r->bahan[$i];
            $resep->Kuantitas = $r->jumlah[$i];
            $resep->save();
        }

        return redirect('master-produk');

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $r)
    {
        //return $r->input();
        $prod = Produk::find($r->id);
        $prod->KodeProduk   = $r->kode;
        $prod->NamaProduk   = $r->nama;
        $prod->BiayaLabor   = $r->labor;
        $prod->Packaging    = $r->packaging;
        $prod->Sticker      = $r->sticker;
        $prod->save();

        Resep::where('ProdukId', $r->id)->delete();

        for ($i = 0; $i<count($r->bahan); $i++){
            $resep = new Resep();
            $resep->ProdukId  = $prod->idProduk;
            $resep->BahanId   = $r->bahan[$i];
            $resep->Kuantitas = $r->jumlah[$i];
            $resep->save();
        }

        return redirect('master-produk');
    }

    public function destroy($id)
    {
        Produk::find($id)->delete();

        return redirect('master-produk');
    }
}
