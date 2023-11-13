<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Bootcamp;
use Illuminate\Support\Str;
use App\Models\KategoriBootcamp;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBootcampRequest;
use App\Http\Requests\UpdateBootcampRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bootcamp = Bootcamp::all();
        return view('Admin.Bootcamp.bootcamp', compact('bootcamp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriBootcamp::all();
        $mentor = User::where('role', '2')->get();
        return view('Admin.Bootcamp.createBootcamp', compact('kategori', 'mentor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBootcampRequest $request)
    {


        // Cara Pertama blm bener!!!!!
        // $thumbnail = $request->file('thumnail');
        // $namaFile = time() . '.' . $thumbnail->getClientOriginalExtension();
        // $thumbnail->move(public_path('img'), $namaFile);


        // Bootcamp::create([

        // 'kategori_id'=> $request->kategori_id,
        // 'mentor_id'=> $request->mentor_id,
        // 'nama'=> $request->nama,
        // 'slug'=> Str::slug($request->nama),
        // 'harga'=> $request->harga,
        // 'deskripsi'=> $request->deskripsi,
        // 'kuota'=> $request->kuota,
        // 'thumbnail' => $namaFile,
        // ]);





        // Cara Kedua Simpel
        Bootcamp::create([
            'kategori_id' => $request->kategori_id,
            'mentor_id' => $request->mentor_id,
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'kuota' => $request->kuota,
            'thumbnail' => $request->file('thumbnail')->store('img_bootcamp'),
        ]);

        return redirect()->route('Bootcamp.index')->with('Create', "Berhasil Menambahkan Data Bootcamp ! $request->nama");
    }

    /**
     * Display the specified resource.
     */
    public function show(Bootcamp $bootcamp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bootcamp $bootcamp)
    {
        $kategori = KategoriBootcamp::all();
        $mentor = User::where("role",2)->get();
        $bootcamp = Bootcamp::findOrFail($bootcamp);

        return view("Admin.Bootcamp.editBootcamp", compact('kategori','mentor','bootcamp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBootcampRequest $request, Bootcamp $bootcamp)
    {
        $bootcamp->update([
            'nama'=> $request->nama,
            'kategori_id'=> $request->kategori_id,
            'mentor_id'=> $request->mentor_id,
            'harga'=> $request->harga,
            'kuota'=> $request->kuota,
            'deskripsi'=> $request->nama,
           
        ]);

        if ($request->file('image')) {
            $thumbnail = $request->file('image');
            $thumbnail->storeAs('public/images', $thumbnail->hashName());

            Storage::delete('public/images' . $bootcamp->thumbnail);

            $bootcamp->update([
                'thumbnail'=> $thumbnail->hashName(),
            ]);

            return redirect()->route('Bootcamp.index')->with('Update', "Bootcamp $request->nama Berhasil di Update !" );

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $bootcamp)
    {
        $bootcamp = Bootcamp::findOrFail($bootcamp->id);
        $bootcamp->delete();
        return redirect()->back()->with('Delete','Berhasil Hapus Data');
    }
}
