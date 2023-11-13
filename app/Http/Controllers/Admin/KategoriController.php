<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('Admin.Kategori.kategori', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Kategori.createKategori');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kategori::create([
            'kategori_id' => $request->kategori_id,
            'slug' => Str::slug($request->kategori_id),
        ]);

        return redirect()->route('Kategori.index')->with('Create', "Berhasil Menambahkan Data $request->kategori_id  !");
    }

    // Search
    public function searchKategori(Request $request){
        if($request->has('search')){
            $kategori = Kategori::where('kategori_id','LIKE','%'. $request->search .'%')->get();
        }else{
            $kategori = Kategori::all();
        }

        return view('Admin.Kategori.kategori', compact('kategori'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('Admin.Kategori.updateKategori', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->kategori_id = $request->kategori_id;
        $kategori->slug = Str::slug($request->kategori_id);
        $kategori->update();

        return redirect()->route('Kategori.index')->with('Update', "Berhasil Update $request->kategori_id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kategori = Kategori::findOrFail($request->id);
        $kategori->delete();
        return redirect()->back()->with('Delete','Data Berhasil di Hapus');
    }
}
