@extends('dashboard.layouts.main')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Category</h4>
        <p class="card-description">
          View,Edit,Delete Category
        </p>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>S.N</th>
                <th>Category</th>
                <th>Parent Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)

                {{-- <tr>
                  <td>{{$loop->iteration}}</td>
                  @if ($category->parent_id==null)
                  <td>{{$category->category_name}}</td>
                  <td>--</td>
                  @else
                  <td>{{$category->category_name}}</td>
                  <td>{{$category->parent->category_name}}</td>

                  @endif
                  <td><a href=""><button class="btn btn-primary">Edit</button>
                  <a href=""><button class="btn btn-danger">Delete</button></td>
                </tr> --}}
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->category_name}}

                    @foreach ($category->child as $sub)

                        {{$sub->category_name}}

                        @endforeach
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
