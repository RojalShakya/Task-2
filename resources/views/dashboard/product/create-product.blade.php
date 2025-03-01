@extends('dashboard.layouts.main')
@section('content')
<div class="row">

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Product</h4>


          <form class="forms-sample" action="{{route('store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Title</label>
              <input type="text" class="form-control" name="category_name" placeholder="Name" value="{{old('title')}}">
              @error('title')
                  <span class="text-danger">{{$message}} </span>
              @enderror
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="js-example-basic-single w-100" name="category_id" >
                    <option value="" selected disabled>Select Option</option>
                    @foreach ($categories as $category)
                    <option value={{$category->id}}>{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}} </span>
            @enderror
              </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" name="price" placeholder="Enter Price">
              @error('price')
              <span class="text-danger">{{$message}} </span>
          @enderror
            </div>
            <div class="form-group">
                <label for="status">Available</label>
                <input type="checkbox" class="form-control" name="status" value="1" {{ old('status', $product->status ?? false) ? 'checked' : '' }}>
            </div>
*
            <div class="form-group">
                <label for="qunatity">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Enter quantity" min="1">
                @error('quantity')
                <span class="text-danger">{{$message}} </span>
            @enderror
              </div>
            <div class="form-group">
                <label for="order">Order</label>
              <input type="integer" class="form-control" name="order">
              @error('order')
              <span class="text-danger">{{$message}} </span>
          @enderror
              </div>



            {{-- <div class="form-group">
                <label for="image">File upload</label>
                <input type="file" name="image_upload" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div> --}}

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>

  </div>
  @endsection
