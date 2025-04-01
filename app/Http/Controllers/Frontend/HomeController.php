<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{
    //

    public function home(){

        return view('frontend.home',[
            'products'=>Product::all(),
            'categories'=>Category::whereNull('parent_id')->get()
        ]);
    }
    public function shop(){
        return view('frontend.shop',[
            'products'=>Product::all(),
            'categories'=>Category::whereNull('parent_id')->with('child')->get()
        ]);
    }

    public function product($id){


        return view('frontend.product',[
            'product'=>Product::findOrFail($id),
            'rating'=>Review::where('product_id',$id)->avg('rating'),
            'comments'=>Review::where('product_id',$id)->count('rating'),

        ]);

    }
    public function productReview(Request $request){

        // $request->request->add(['user_id'=>Auth::user()->id]);
        //  dd($request->all());
        Review::create([
        'user_id'=>Auth::user()->id,
        'product_id'=>$request->product_id,
        'rating'=>$request->rating,
        'comment'=>$request->comment

        ]);
        return redirect()->back();
    }
}
