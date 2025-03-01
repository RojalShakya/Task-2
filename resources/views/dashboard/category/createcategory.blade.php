@extends('dashboard.layouts.main')
@section('content')
<div class="row">

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Category</h4>

          <form class="forms-sample" action="{{route('create-category')}}" method="POST" >
            @csrf
            <div class="form-group">
              <label for="category_name">Category </label>
              <input type="text" class="form-control" name="category_name" placeholder="Category">
            </div>
            <div class="form-group">
              <label for="category_id">Parent Category</label>
              <select class="js-example-basic-single w-100" name="parent_id">
                <option value="">No Parent --Main Category</option>

                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
              </select>
            </div>


            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>

  </div>

  @endsection
