@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h2>Role Management Pannel</h2>

        @if (session('message'))
            {{-- <div class="alert alert-success">{{ session('success') }}</div> --}}
            @section('script')
                <script>
                    Toastify({
                        text: "{{ session('message') }}",
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
                        onClick: function() {} // Callback after click
                    }).showToast();
                </script>
            @endsection
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Role Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ ucfirst($role->name) }}</td>
                        <td>
                            <a href=""><button class="btn btn-primary">Edit</button></a>
                            <form id="status-form" action="{{ route('permission.destroy', $role->id) }}" method="POST"
                                class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger delete_confirmation" title="Delete">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
