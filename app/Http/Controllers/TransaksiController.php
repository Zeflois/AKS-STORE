<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TransaksiController extends Controller
{
    public function index() {
        $datas = DB::select('select * from transaksi_tb where is_delete = 0');

        return view('transaksi.index')
            ->with('datas', $datas);
    }
        
    public function add() {
        return view('transaksi.add');
    }

    public function store(Request $request) {
        // return view('transaksi.add');
        $request->validate([
            
            'id_transaksi' => 'required',
            'total_harga' => 'required',
            'tanggal_transaksi' => 'required',
            'id_aksesoris' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO transaksi_tb(id_transaksi, total_harga, tanggal_transaksi, id_aksesoris) VALUES (:id_transaksi, :total_harga, :tanggal_transaksi, :id_aksesoris)',
        [
            'id_transaksi' => $request->id_transaksi,
            'total_harga' => $request->total_harga,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'id_aksesoris' => $request->id_aksesoris,
        ]
        );

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi_tb berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('transaksi_tb')->where('id_transaksi', $id)->first();
        return view('transaksi.edit')->with('data', $data);
    }

        // $data = DB::table('transaksi_tb')->where('id_transaksi', $id)->first();
        

    public function update($id, Request $request) {
        $request->validate([
            'id_transaksi' => 'required',
            'total_harga' => 'required',
            'tanggal_transaksi' => 'required',
            'id_aksesoris' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE transaksi_tb SET id_transaksi = :id_transaksi, total_harga = :total_harga, tanggal_transaksi = :tanggal_transaksi, id_aksesoris = :id_aksesoris WHERE id_transaksi=:id',
        [
            'id' => $id,
            'id_transaksi' => $request->id_transaksi,
            'total_harga' => $request->total_harga,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'id_aksesoris' => $request->id_aksesoris,
        ]
        );

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi_tb berhasil diubah');
    }

    public function destroy($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM transaksi_tb WHERE id_transaksi = :id_transaksi', ['id_transaksi' => $id]);

        // Menggunakan laravel eloquent
        // transaksi_tb::where('id_transaksi_tb', $id)->delete();

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi_tb berhasil dihapus');
    }

    public function soft($id)
    {
        DB::update('UPDATE transaksi_tb SET is_delete = 1 WHERE id_transaksi = :id_transaksi', ['id_transaksi' => $id]);

        return redirect()->route('transaksi.index')->with('success', 'Data Barang berhasil dihapus');
    }

}
