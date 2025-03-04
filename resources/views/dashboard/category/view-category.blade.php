@extends('dashboard.layouts.main')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Category</h4>
        <p class="card-description">
          View,Edit,Delete Category
        </p>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
         @elseif(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
         @endif
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th colspan="2">Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        @if ($category->parent_id == null)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td colspan="2">{{ $category->category_name }}</td>
                                <td>
                                    <a href=""><button class="btn btn-primary">Edit</button></a>

                                    <a href="{{route('category.destroy',['ids'=>$category->id])}}"><button class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>

                            @foreach ($category->child as $sub)
                                <tr>
                                    <td></td>
                                    <td>{{ $sub->category_name }}</td>
                                    <td></td>
                                    <td>
                                        <a href=""><button class="btn btn-primary">Edit</button></a>
                                        <a href="{{route('category.destroy',['ids'=>$sub->id])}}"><button class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

@endsection
