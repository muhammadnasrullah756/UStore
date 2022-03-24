<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Barang;

class MainController extends Controller
{
    public function home() {
        $barang = Barang::all();
        return response()->json($barang, 200);
    }

    public function dashboardseller() {
        $data = Barang::where('user_id', Auth::id())->get();
        return response()->json($data, 200);

    }

    public function detailproduct($id) {
        $data = Barang::where('id', $id)->get();
        return response()->json($data, 200);
    }
}
