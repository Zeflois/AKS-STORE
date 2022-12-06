<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class kasirController extends Controller
{
    public function index() {
        $datas = DB::select('select * from kasir_tb where is_delete = 0');

        return view('kasir.index')
            ->with('datas', $datas);
    }
        
    public function add() {
        return view('kasir.add');
    }

    public function store(Request $request) {
        // return view('kasir.add');
        $request->validate([
            
            'id_kasir' => 'required',
            'nama_kasir' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO kasir_tb(id_kasir, nama_kasir) VALUES (:id_kasir, :nama_kasir)',
        [
            'id_kasir' => $request->id_kasir,
            'nama_kasir' => $request->nama_kasir,

        ] 
        );

        return redirect()->route('kasir.index')->with('success', 'Data kasir_tb berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('kasir_tb')->where('id_kasir', $id)->first();
        return view('kasir.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_kasir' => 'required',
            'nama_kasir' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE kasir_tb SET id_kasir = :id_kasir, nama_kasir = :nama_kasir WHERE id_kasir = :id',
        [
            'id' => $id,
            'id_kasir' => $request->id_kasir,
            'nama_kasir' => $request->nama_kasir,
        ]
        );

        return redirect()->route('kasir.index')->with('success', 'Data kasir_tb berhasil diubah');
    }

    public function destroy($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM kasir_tb WHERE id_kasir = :id_kasir', ['id_kasir' => $id]);

        // Menggunakan laravel eloquent
        // kasir_tb::where('id_kasir_tb', $id)->delete();
        
        return redirect()->route('kasir.index')->with('success', 'Data kasir_tb berhasil dihapus');
    }

    public function soft($id)
    {
        DB::update('UPDATE kasir_tb SET is_delete = 1 WHERE id_kasir = :id_kasir', ['id_kasir' => $id]);

        return redirect()->route('kasir.index')->with('success', 'Data kasir_tb berhasil dihapus');
    }

}
