@extends('dashboard.layouts.main')
@section('content')
<div class="row">

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Blogs</h4>

          <form class="forms-sample" action="{{route('update-product',['ids'=>$product->id])}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Title</label>
              <input type="text" class="form-control" name="title" value="{{ old('title', $product->title?? '') }}">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="js-example-basic-single w-100" name="category_id" >
                    <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Select Option</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($product->category_id==$category->id) selected @endif>
                            {{ $category->title }}
                        </option>
                    @endforeach

                </select>
                @error('category_id')
                <span class="text-danger">{{$message}} </span>
            @enderror
              </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" name="price" placeholder="Enter Price" value="{{$product->price}}">
              @error('price')
              <span class="text-danger">{{$message}} </span>
          @enderror
            </div>
            <div class="form-group">
              <label for="status">Available</label>
              <input type="checkbox" class="form-control" name="status" value="1"@if ($product->status=1) checked @endif>

            </div>
            <div class="form-group">
                <label for="qunatity">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Enter quantity" min="1" value="{{old('quantity',$product->quantity)}}">
                @error('quantity')
                <span class="text-danger">{{$message}} </span>
            @enderror
              </div>
            <div class="form-group">
                <label for="order">Order</label>
              <input type="integer" class="form-control" name="order"n value="{{old('order',$product->order)}}">
              @error('order')
              <span class="text-danger">{{$message}} </span>
          @enderror
             </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>

  </div>
@endsection
