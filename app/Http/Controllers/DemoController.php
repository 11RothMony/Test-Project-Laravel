<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function tag(){
        return view('tag');
    }


    public function category(){
        $categorys = ['Drone E88 Pro', 'Drone E88'];


        return view('category', ['categoryss' => $categorys]);
    }


    public function blog(){
        return view('blog');
    }
}
