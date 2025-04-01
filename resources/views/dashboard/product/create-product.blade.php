@extends('dashboard.layouts.main')
@section('content')
<div class="row">

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Product</h4>
          <form class="forms-sample" action="{{route('create-product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{$errors}}
            <div class="form-group">
              <label for="name">Product Name</label>
              <input type="text" class="form-control" name="product" placeholder="Name" value="{{old('product')}}">
              @error('product')
                  <span class="text-danger">{{$message}} </span>
              @enderror
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    <option value="" selected disabled>Select Option</option>

                    @forelse ($categories as $category)
                    <optgroup label="{{$category->category_name}}" >
                        @if ($category->child->count() > 0)
                            @foreach ($category->child as $child)
                                <option value="{{ $child->id }}">{{ $child->category_name }}</option>
                            @endforeach
                        @endif
                    </optgroup>
                    @empty
                        <option value="" disabled>No categories available</option>
                    @endforelse
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
              <label for="qunatity">Quantity</label>
              <input type="number" class="form-control" name="quantity" placeholder="Enter quantity" min="1">
              @error('quantity')
              <span class="text-danger">{{$message}} </span>
          @enderror
            </div>
            <div class="form-group">
                <label for="image">File upload</label>
                <input type="file" name="image" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>
            <div class="form-group">
                <label for="status">Available</label>
                <input type="checkbox" class="form-control" name="status" value="1" {{ old('status', $product->status ?? false) ? 'checked' : '' }}>
            </div>

<div class="form-group">
    <label for="desc">Description</label>
    <textarea class="form-control" id="myeditorinstance" name="description" rows="4"></textarea>
  </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>

  </div>
  @endsection
