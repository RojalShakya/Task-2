@extends('dashboard.layouts.main')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Product</h4>
        <p class="card-description">
          View,Edit,Delete Product
          <a href="{{route('create-product')}}"><button class="btn btn-success float-right">Add Product</button></a>
        </p>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
                <th>Quantity</th>
                <th>Preview</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($products as $product)
                <tr>
                  <td>{{$product->product}}</td>
                  <td>
                            <li>{{$product->category->category_name}}</li>
                  </td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->status}}</td>
                  <td>{{$product->quantity}}</td>

                  <td><img style="width: 50px height:30px" src="{{asset($product->image)}}" class="table-control"></td>
                  <td>
                      <a href="{{route('edit-product',['ids'=>$product->id])}}"><button class="btn btn-primary">Edit</button></a>
                      <a href="{{route('destroy-product',['ids'=>$product->id])}}"><button class="btn btn-danger">Delete</button></a>
                </td>

                </tr>

                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
