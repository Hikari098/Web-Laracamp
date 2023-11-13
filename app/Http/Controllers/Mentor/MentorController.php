<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Bootcamp;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorController extends Controller
{
    public function index(){
        return view('Mentor.index');
    }

    public function myBootcamp(){
       

        $bootcamp = Bootcamp::where('mentor_id', Auth::user()->id)->get();
        return view('Mentor.mybootcamp', compact('bootcamp'));
    }

    public function profile(){
        $id = Auth::user()->id;
        // firs[data tunggal]
        $user = User::where('id', $id)->first();
        return view('Mentor.profileMentor', compact('user'));
    }

    public function listPeserta($id){
        $bootcamp = Bootcamp::findOrFail($id);
        $peserta = Transaksi::where('bootcamp_id', $id)->get();
        return view('Mentor.listPeserta', compact('bootcamp','peserta'));
    }
}
