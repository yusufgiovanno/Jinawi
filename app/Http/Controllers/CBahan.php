<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;

class CBahan extends Controller
{
    public function index()
    {
        $data = Bahan::all();
        //return $data;
        return view('/master.bahan', ['data' => $data]);
    }


    public function create()
    {
        return view('master.bahan-insert');
    }

    public function store(Request $r)
    {
        $bahan = new Bahan();
        $bahan->KodeBahan  = $r->kb;
        $bahan->NamaBahan  = $r->nb;
        $bahan->BobotBahan = $r->brt;
        $bahan->HargaBahan = $r->hrg;
        $bahan->save();

        return redirect('/master-bahan');
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

        $bhn = Bahan::find($r->id);
        $bhn->KodeBahan  = $r->kb;
        $bhn->NamaBahan  = $r->nb;
        $bhn->BobotBahan = $r->brt;
        $bhn->HargaBahan = $r->hrg;
        $bhn->save();

        return redirect('/master-bahan');
    }

    public function destroy($id)
    {
        Bahan::find($id)->delete();
        return redirect('/master-bahan');
    }
}
