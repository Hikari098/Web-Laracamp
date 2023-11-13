<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('Admin.Product.product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('Admin.Product.createProduct', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $namaFile = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img'), $namaFile);

        Product::create([
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'slug' => Str::slug($request->nama_produk),
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'image' => $namaFile,
        ]);

        return redirect()->route('Product.index')->with('Create', "Berhasil Menambahkan Data $request->nama_produk");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::find($product->id);
        return view('Admin.Product.showProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $product = Product::findOrFail($id);
        return view('Admin.Product.updateProduct', compact('product', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        // Jika ingin Update Foto Artikel & tidak upload foto baru

        if ($request->file('image') == "") {

            $product([
                'kategori_id' => $request->kategori_id,
                'nama_produk' => $request->nama_produk,
                'slug' => Str::slug($request->nama_produk),
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'image' => $request->image,

            ]);
        } else {
            $image = $request->file('image');
            $namaFile = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $namaFile);

            $product->update(
                [
                    'kategori_id' => $request->kategori_id,
                    'nama_produk' => $request->nama_produk,
                    'slug' => Str::slug($request->nama_produk),
                    'harga' => $request->harga,
                    'deskripsi' => $request->deskripsi,
                    'image' => $namaFile,
                    // bagian image untuk ['image' => $namaFile,] tidak dipakaikan request langsung panggil $namaFile nya
                ]

            );
        }

        // // Cara Kedua atau praktis

        // if ($request->hasFile('image/storage/')){

        //     // Upload Image Baru
        //     $img_artikel = $request->file('img_artikel/storage/');
        //     $img_artikel->storeAs('public/images/storage/', $img_artikel->hashName());

        //     // Hapus Foto Lama
        //     Storage::delete('public/images/storage/'. $img_artikel->hashName());

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


        return redirect()->route('Product.index')->with('Update', "Data $request->nama_produk Berhasil Update !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();

        return redirect()->back()->with('Delete', "Data Berhasil di hapus !");
    }


    // Filter
    public function skincare()
    {
      $kategori = Kategori::all();
      $product = Product::where('kategori_id', 1)->get();
      return view('Admin.Product.product', compact('product'));
    }
    public function bodycare()
    {
      $kategori = Kategori::all();
      $product = Product::where('kategori_id', 2)->get();
      return view('Admin.Product.product', compact('product'));
    }
    public function haircare()
    {
      $kategori = Kategori::all();
      $product = Product::where('kategori_id', 3)->get();
      return view('Admin.Product.product', compact('product'));
    }


    // Search
    public function searchProduk(Request $request){
        if($request->has('search')){
            $product = Product::where('nama_produk','LIKE','%'. $request->search .'%')->get();
        }else{
            $product = Product::all();
        }

        return view('Admin.Product.product', compact('product'));

    }

    
}
