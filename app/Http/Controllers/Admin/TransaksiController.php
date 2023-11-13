<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index(){
        $transaksi = Transaksi::all();
        return view('Admin.Transaksi.transaksi',compact('transaksi'));
    }

    public function hapusTransaksi(Request $request){
        $transaksi = Transaksi::findOrfail($request->id);
        $transaksi->delete();
        return redirect()->route('index.transaksi')->with('Delete','Berhasil Hapus Data Transaksi');
    }

    public function updateTransaksi(Request $request){
        $transaksi = Transaksi::findOrfail($request->id);
        $transaksi->status = $request->status;
        $transaksi->update();
        return redirect()->back()->with('Update','Berhasil Update Data Transaksi');
    }
}
