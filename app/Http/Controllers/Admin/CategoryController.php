<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = category::all();
        return view ('admin.category.index', ['categories'=> $categories]);
    }
    public function create(){
        return view ('admin.category.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        // write logic for save to databass
        $category = new category();
        $category->name = $request->name;
        $category->save();
        //redirect to route
        return redirect()->route('admin.category.index');

    }

    public function edit($id){
        // dd('edit category', $id);
        $category = category::findOrFail($id);
        return view ('admin.category.edit',['category'=> $category]);
    }
    public function update( Request $request, $id){
        // dd('update', $id);
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        $category = category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.category.index');
    }
    public function destroy(Request $request, $id){
        // dd('destroy', $id);
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
