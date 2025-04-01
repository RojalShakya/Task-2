<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidation;
use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productService;

    public function __construct(ProductService $productService){
        $this->productService=$productService;
    }

    public function index(){
        return $this->productService->index();

    }
    public function store(ProductValidation $request){

        return $this->productService->createProduct($request);

    }
    public function view(){
        $products=Product::with('category')->get();

            return view('dashboard.product.view-product',compact('products'));

    }
    public function edit($id){
        $data['product']=Product::findOrFail($id);

        $data['categories']=Category::whereNull('parent_id')->with('child')->get();
        if(is_null($data['product'])){
            return redirect()->back();
        }
        return view('dashboard.product.edit-product',compact('data'));
    }
    public function update(ProductValidation $request,$id){
       $product=Product::findOrFail($id);
       $product->update($request->all());
       if($request->hasFile('image')){

        $uploadFile=$product->image->store('product','public');
        $image_name='storage/'.$uploadFile;
        $product->update(['image'=>$image_name]);
    }else{
        $image_name=null;
    }
    return redirect()->route('product-list');


    }
    public function destroy($id){
    $product=Product::findOrFail($id);
    $product->delete();
    return redirect()->route('product-list');

    }

}
