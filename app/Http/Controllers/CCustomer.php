<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CCustomer extends Controller
{
    public function index()
    {
        $data = Customer::all();
        //return $data;
        return view('/master.customer', ['data' => $data]);
    }

    public function create()
    {
        return view('master.customer-insert');
    }

    public function store(Request $r)
    {
        $cust = new Customer();
        $cust->NamaCustomer   = $r->nama;
        $cust->DiskonCUstomer = $r->diskon;
        $cust->save();

        return redirect('/master-customer');
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
        $cust = Customer::find($r->id);
        $cust->NamaCustomer   = $r->nama;
        $cust->DiskonCustomer = $r->diskon;
        $cust->save();

        return redirect('/master-customer');
    }

    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect('/master-customer');
    }
}
