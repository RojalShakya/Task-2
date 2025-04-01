<?php
namespace App\Http\Services;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductService{
    public function index(){
        // $categories = Category::whereNull('parent_id')->with('child')->get();
    return view('dashboard.product.create-product',[
            'categories'=>Category::whereNull('parent_id')->with('child')->get(),
        ]);
    }
    public function createProduct($request)
    {
        try{
            DB::beginTransaction();
            if($request->hasFile('image')){

                $uploadFile=$request->image->store('product','public');
                $image_name='storage/'.$uploadFile;
            }else{
                $image_name=null;
            }
            $product=Product::create($request->all());
            $product->update(['image'=>$image_name]);
            DB::commit();
            return redirect('/product')->with('success','Prouct created succesfully');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('/product')->withInput()->with('error','Please Check'.$e->getMessage());
        }
    }


}

