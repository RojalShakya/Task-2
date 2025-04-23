
@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h2>Admin Panel - Permission Management</h2>

    @if(session('message'))
        {{-- <div class="alert alert-success">{{ session('success') }}</div> --}}
        @section('script')
        <script>
        Toastify({
            text: "{{session('message')}}",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
              background: "linear-gradient(to right, #00b09b, #96c93d)",

            },
            offset: {
    x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
    y: 100 // vertical axis - can be a number or a string indicating unity. eg: '2em'
  },
            onClick: function(){} // Callback after click
          }).showToast();
          </script>
        @endsection
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->status) }}</td>
                    <td>
                        <form action="{{route('update-role',['user'=>$user->id])}}" method="POST">
                            @csrf
                            {{-- <input type="hidden" name="id" value="{{$user->id}}"> --}}
                            <select name="roles" onchange="this.form.submit()">

                                    <option value="" disabled selected>Assign Role</option>

                                @foreach ($roles as $role)

                                    <option value={{$role->id}} {{ $user->roles->contains($role->id) ?'selected':''}}>{{$role->name}}</option>

                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('update-status')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <select name="status" onchange="this.form.submit()">
                                <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
