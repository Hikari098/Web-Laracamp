<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBootcamp;
use App\Http\Controllers\Controller;

class KategoriBootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriBootcamp::all();
       return view('Admin.KategoriBootcamp.kategoriBootcamp', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        KategoriBootcamp::create([

            'kategori' => $request->kategori,
            'slug'=> Str::slug($request->kategori),
        ]);

        return redirect()->back()->with('Create','Berhasil Tambah Data Kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBootcamp $kategoriBootcamp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriBootcamp $kategoriBootcamp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriBootcamp $kategoriBootcamp)
    {
        $kategori = KategoriBootcamp::findOrFail($request->id);
        $kategori->kategori = $request->kategori;
        $kategori->slug = Str::slug($request->kategori);
        $kategori->update();

        return redirect()->back()->with('Update','Berhasil Update Data Kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriBootcamp $kategoriBootcamp)
    {
        $kategori = KategoriBootcamp::findOrFail($kategoriBootcamp->id);
        $kategori->delete();
        return redirect()->back()->with('Delete','Berhasil Hapus Data');
    }
}
