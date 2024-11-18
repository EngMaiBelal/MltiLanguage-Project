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
            'name.*'=>['required', 'unique_translation:categories'],
        ]);
        
        $category = Category::create([
            'name'=> $request->name
        ]);

        if(!$category){
            return redirect()->back()->with("error", "something went wrong");
        }
        return redirect()->back()->with("success", "Category added Successfully");
    }
    
    public function edit($id){
        $category = Category::findorfail($id);
        // dd($category);
        return view('edit-category', compact('category'));
    }
    public function update(Request $request){
        dd($request);
    }
}
