<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tags;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function tag(){

        $tags = Tags::all();
        return view('Admin.Tag.tag', compact('tags'));
    }

        
      public function searchTag(Request $request){
        if($request->has('search')){
            $tags = Tags::where('tags', 'LIKE', '%'.$request->search.'%')->get();
        }else{
            $tags= Tags::all();
        }
        return view('Admin.Tag.tag', compact('tags'));
      }

    public function createTag(Request $request){
        // dd($request->all());

        Tags::create([
            'tags' => $request->tags,
            'slug' => Str::slug($request->tags),
        ]);

        return redirect()->back()->with('Create', 'Success Add Data !');
    }

    public function updateTag(Request $request){
        $tags = Tags::findOrFail($request->id);
        $tags->tags = $request->tags;
        $tags->slug = Str::slug($request->tags);
        $tags->update();
        return redirect()->back()->with('Update', 'Success Update Data !');
    }

    public function deleteTag(Request $request){
        $tags = Tags::findOrFail($request->id);
        $tags->delete();
        return redirect()->back()->with('Delete', 'Success Delete Data !');

    }
}
