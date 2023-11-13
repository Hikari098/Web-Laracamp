<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tags;
use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArtikelRequest;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index(){
        $artikel = Artikel::all();
        $tags = Tags::all();
        return view('Admin.Artikel.artikel', compact('tags', 'artikel'));
    }


    public function  formArtikel(){

        $tags = Tags::all();
        return view('Admin.Artikel.createArtikel', compact('tags'));
    }

    public function createArtikel(ArtikelRequest $request){
        // dd($request->all());


        // Cara Pertama
        
        $img_artikel = $request->file('img_artikel');
        $namaFile = time() . '.' . $img_artikel->getClientOriginalExtension();
        $img_artikel->move(public_path('img'), $namaFile);

          Artikel::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'tags' => $request->tags,
            'artikel' => $request->artikel,
            'img_artikel' => $namaFile,
        ]);


        // Cara kedua


        // Artikel::create([
        //     'title' => $request->title,
        //     'slug' => Str::slug($request->title),
        //     'tags' => $request->tags,
        //     'artikel' => $request->artikel,
        //     'img_artikel' => $request->file('img_artikel'),
        // ]);

        return redirect()->route('admin.index.artikel')->with('Create' , "Data $request->title Berhasil Disimpan !");
    }

    public function editArtikel($id){
        $tags =Tags::all();

        $artikel = Artikel::findOrFail($id);

        return view('Admin.Artikel.editArtikel', compact('tags', 'artikel'));

    }

    public function updateArtikel(Request $request, $id){
        // dd($request->all());



        // Cara Pertama / Ribet

    

        $artikel = Artikel::findOrFail($id);

        // Jika ingin Update Foto Artikel & tidak upload foto baru

        if($request->file('img_artikel') == "" ){

            $artikel([
                'title' => $request->title,
                'artikel' => $request->artikel,
                'tags' => $request->tags,
                'img_artikel' => $request->artikel,
                'slug' => Str::slug($request->title),
             
            ]);
        }else{
            $img_artikel = $request->file('img_artikel');
            $namaFile = time() . '.' . $img_artikel->getClientOriginalExtension();
            $img_artikel->move(public_path('img'), $namaFile);

            $artikel->update([
                'title' => $request->title,
                'tags' => $request->tags,
                'artikel' => $request->artikel,
                'slug' => Str::slug($request->title),
            ]);
        }





        // $artikel = Artikel::findOrFail($id);

        // // Cara Kedua atau praktis

        // if ($request->hasFile('image')){

        //     // Upload Image Baru
        //     $img_artikel = $request->file('img_artikel');
        //     $img_artikel->storeAs('public/images', $img_artikel->hashName());

        //     // Hapus Foto Lama
        //     Storage::delete('public/images'. $img_artikel->hashName());

        //     // Update dg Gambar Baru
        //     $artikel->update([
        //         'img_artikel' => $img_artikel->hashName(),
        //     ]);
        // }else{
        //     // Kalau Ngga Up Foto , TEtep up data yg lain
        //     $artikel->title = $request->title;
        //     $artikel->tags = $request->tags;
        //     $artikel->img_artikel = $request->file('img_artikel')->store('img-artikel');
        //     $artikel->slug = Str::slug($request->title);
        //     $artikel->artikel = $request->artikel;
           
        // }

        // // Menyimpan Data Perubahan
        // $artikel->update();

        return redirect()->route('admin.index.artikel')->with('Update' , "Data $request->title Berhasil Update !");

    }

    public function deleteArtikel(Request $request){

        $artikel = Artikel::findOrFail($request->id);
        Storage::delete($artikel->img_artikel);
        $artikel->delete();
        return redirect()->back();
    }
}


