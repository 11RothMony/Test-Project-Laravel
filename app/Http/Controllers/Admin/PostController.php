<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\tag;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view ('admin.post.index',['post'=> $post]);

    }

    public function create()
    {
        $category = category::all();
        $tag = tag::all();
        return view ('admin.post.create', ['category'=>$category, 'tag'=> $tag]);
    }

    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
        $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
        $filePath = $request->file('thumbnail')->storeAs(
            'uploads',
            $fileName,
            'public'
        );

        $post = new Post();
        $post->title = $request -> title;
        $post->content = $request -> content;
        $post->thumbnail = $filePath;
        $post->category_id = $request -> category_id;
        $post ->save();

        $post->tags()->sync($request->tags);

        return redirect()->route('admin.post.index', ['post'=> $post]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {

        $post = Post::findOrFail($id);
        $category = category::all();
        $tag = tag::all();

        return view ('admin.post.edit',['post'=> $post, 'category'=>$category, 'tag'=> $tag]);
    }

    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            //code...
            $validated = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'thumbnail' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'category_id' => 'required|exists:categories,id',
            ]); 
     
    
            $post = Post::findOrFail($id);
            $post->title = $request -> title;
            $post->content = $request -> content;
            $post->category_id = $request -> category_id;
    
            if($request->hasFile('thumbnail')){
                $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
                $filePath = $request->file('thumbnail')->storeAs(
                    'uploads',
                    $fileName,
                    'public'
                );
                $post->thumbnail = $filePath;
            }
            
            $post ->save();
    
            $post->tags()->sync($request->tags);
            DB::commit();
            return redirect()->route('admin.post.index', ['post'=> $post]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
        //
    }

    public function destroy(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.post.index');
    }
}
