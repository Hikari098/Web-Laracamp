<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    public function index()
    {

        $mentor = User::where('role', 2)->get();

        return view('Admin.CrudMentor.indexMentor', compact('mentor'));
    }

    public function formMentor()
    {
        return view('Admin.CrudMentor.formMentor');
    }

    public function createMentor(Request $request)
    {

        // Cara Pertama
        $img = $request->file('img');
        $namaFile = time() . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('img'), $namaFile);


        User::create([

            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => 2,
            'password' => Hash::make($request->password),
            'img' => $namaFile,
        ]);



        // Cara Kedua
        // User::create([

        //     'name' =>$request->name,
        //     'username' =>$request->username,
        //     'email' =>$request->email,
        //     'role' => 2,
        //     'password' =>Hash::make($request->password),
        //     'img' => $request->file('img')->store('img-mentor')
        // ]);

        return redirect()->route('admin.index.data.mentor')->with('Create', "Data $request->name berhasil disimpan");
    }

    public function deleteMentor(Request $request)
    {

        $mentor = User::findOrFail($request->id);
        Storage::delete($mentor->img);
        $mentor->delete();
        return redirect()->back();
    }

    
}
