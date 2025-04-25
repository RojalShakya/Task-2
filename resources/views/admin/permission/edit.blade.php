@extends('dashboard.layouts.main')
@section('content')
    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Permission</h4>

                    <form class="forms-sample" action="{{ route('permission.update',$role->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="role">Role Label </label>
                            <input type="text" class="form-control" name="name" placeholder="Role" required value={{($role->name)}}>
                            <br>
                            <h4 class="card-title"> Permission</h4>
                            @foreach ($getPermission as $value)
                            {{$value['name']}}
                            <div class="row">
                                @foreach ($value['group'] as $group)
                                <div class="col-md-2">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="{{$group['id']}}" name="permission_id[]"
                                                {{in_array($group['name'],$rolePermission)?'checked':''}}>
                                                {{$group['name']}}
                                            </label>
                                        </div>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            @endforeach
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </div>
    </div>
    </form>
    </div>
    </div>
    </div>

    </div>
@endsection
