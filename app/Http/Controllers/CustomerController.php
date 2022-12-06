<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index() {
        $datas = DB::select('select * from customer_tb');

        return view('customer.index')
            ->with('datas', $datas);
    }
        
    public function add() {
        return view('customer.add');
    }

    public function store(Request $request) {
        // return view('customer.add');
        $request->validate([
            
            'id_customer' => 'required',
            'nama_customer' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO customer_tb(id_customer, nama_customer) VALUES (:id_customer, :nama_customer)',
        [
            'id_customer' => $request->id_customer,
            'nama_customer' => $request->nama_customer,

        ] 
        );

        return redirect()->route('customer.index')->with('success', 'Data customer_tb berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('customer_tb')->where('id_customer', $id)->first();
        return view('customer.edit')->with('data', $data);

        
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_customer' => 'required',
            'nama_customer' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE customer_tb SET id_customer = :id_customer, nama_customer = :nama_customer WHERE id_customer = :id',
        [
            'id' => $id,
            'id_customer' => $request->id_customer,
            'nama_customer' => $request->nama_customer,
        ]
        );

        return redirect()->route('customer.index')->with('success', 'Data customer berhasil diubah');
    }

    public function destroy($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM customer_tb WHERE id_customer = :id_customer', ['id_customer' => $id]);

        // DB::delete('DELETE FROM customer_tb WHERE id_customer = :id_customer', ['id_customer' => $id]);
        // Menggunakan laravel eloquent

        return redirect()->route('customer.index')->with('success', 'Data customer berhasil dihapus');
    }

}
