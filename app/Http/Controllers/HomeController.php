<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request){
        //query data category id into blog category
        $posts = Post::when($request->category_id, function($query, $category_id){
            $query-> where('category_id', $category_id);
        })
        //query data tag id into blog tag
        ->when($request->tag_id, function($query, $tag_id){
            $query->whereHas('tags', function ($sub_query) use($tag_id) {
                $sub_query->where('id', $tag_id);
            });
        })
        //define items in pagination
        ->paginate(8);
        return view ('index', ['posts' => $posts]);
    }
    public function article(Request $request, $id){
        $post = Post::findOrFail($id);
        return view('article', ['post' => $post]);
    }
}
