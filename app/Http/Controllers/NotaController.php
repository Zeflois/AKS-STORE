<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NotaController extends Controller
{
    public function index(Request $request) {
       if ($request->has('search')) {
        $datas = DB::select('select * from nota WHERE nama_customer LIKE :search',[
            'search' => '%'.$request->search.'%',
        ]);

        return view('nota.index')
            ->with('datas', $datas);
       } else {
        $datas = DB::select('select * from nota');

        return view('nota.index')
            ->with('datas', $datas);
       }
    }
}
