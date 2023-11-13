<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function index(){

        // menghitung
        $sukses = Transaksi::where('peserta_id', Auth::user()->peserta->id)->where('status', 1)->count();
        $pending = Transaksi::where('peserta_id', Auth::user()->peserta->id)->where('status', 2)->count();
        $batal = Transaksi::where('peserta_id', Auth::user()->peserta->id)->where('status', 3)->count();
       

        return view('Peserta.indexPeserta', compact('sukses','pending','batal'));
    }

    public function profile(){
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();

        return view('Peserta.profilePeserta',compact('user'));
    }

    public function profileUpdate($id){
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();

        return view('Peserta.updateProfile',compact('user'));
    }

    public function updateProfile(Request $request){
        $peserta = Peserta::findOrFail($request->id);

        $peserta->name = $request->name;
        $peserta->username = $request->username;
        $peserta->email = $request->email;
        $peserta->telepon = $request->telepon;
        $peserta->tanggal_lahir = $request->tanggal_lahir;
        $peserta->pekerjaan = $request->pekerjaan;

        $peserta->update();
        return redirect()->route('peserta.profile.update');

    }

    public function suksesBeli(){
        return view('Peserta.suksesBeli');

    }

    public function transaksi(){
        $transaksi = Transaksi::where('peserta_id', Auth::user()->peserta->id)->get();
        return view('Peserta.transaksiPeserta',compact('transaksi'));
    }

    public function mybootcamp(){
        $transaksi = Transaksi::where('peserta_id', Auth::user()->peserta->id)->get();
        return view('Peserta.myBootcamp',compact('transaksi'));
    }

}
