<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

public function index(){

    $categories=Category::whereNull('parent_id')->with('child')->get();
    //  dd($categories->toArray());

    return view('dashboard.category.view-category',compact('categories'));
}
public function create(){
    $categories = Category::whereNull('parent_id')->with('child')->get();
    return view("dashboard.category.createcategory",compact('categories'));
}
public function store(Request $request){

    $validated=$request->validate([
        'category_name'=>'required|unique:categories,category_name|regex:/^[a-zA-Z0-9 ]+$/',
    ]);
    Category::create($request->all());
    return redirect()->route('view-category');


}


}
