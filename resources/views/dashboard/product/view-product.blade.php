@extends('dashboard.layouts.main')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Product</h4>
        <p class="card-description">
          View,Edit,Delete Product
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
                <th>Order</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($products as $product)
                <tr>
                  <td>{{$product->title}}</td>
                  <td>
                            <li>{{$product->category->title}}</li>
                  </td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->status}}</td>
                  <td>{{$product->quantity}}</td>
                  <td>{{$product->order}}</td>
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
