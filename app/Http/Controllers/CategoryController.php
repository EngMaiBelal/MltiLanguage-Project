<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view('category', compact('categories'));
    }
    
    public function store(Request $request){
        $request->validate([
            'name.*'=>['required'],
        ]);
        
        $category = Category::create([
            'name'=> $request->name
        ]);

        if(!$category){
            return redirect()->back()->with("error", "something went wrong");
        }
        return redirect()->back()->with("success", "Category added Successfully");
    }
}
