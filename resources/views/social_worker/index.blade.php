@extends('adminlte::page')
@section('title', 'Admin Dashboard')
@section('content_header')


   

@stop
@section('content')
@include('sweetalert::alert')
<br>
<div class="card col-md-12">
    <div class="card-header">
    <div class="row">
    <div class="col">
        <h5 style="font-family: 'poppins', sans-serif; font-weight: 400; color: #333;">Social Workers <i class="fas fa-users"></i></h5>
    </div>
    
    <div class="col text-end">
        <a href="{{ route('social_worker.create') }}" class="btn btn-primary btn-sm float-right">
            <i class="fas fa-plus-circle"></i> Add Social Worker 
        </a>
    </div>
</div>
        
    </div>
    <div class="col-md-12">
<div class="card-body">
        <!-- Card content goes here -->
        
    
   

        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session}}',
                showConfirmButton: true
            });
        </script>
    @endif

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Years of Service</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($socialWorkers as $worker)
                <tr>
                <td><input type="checkbox"></td>
                    <td>{{ $worker->name }}</td>
                    <td>{{ $worker->email }}</td>
                    <td>{{ $worker->phone }}</td>
                    <td>{{ $worker->age }}</td>
                    <td>{{ ucfirst($worker->gender) }}</td>
                    <td>{{ $worker->years_of_service }}</td>
                    
                    <td>
                        <a href="{{ route('social_worker.edit', $worker->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('social_worker.destroy', $worker->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this social worker?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
                {{ $socialWorkers->links('pagination::bootstrap-4') }}
                 </div>
</div>

    </div>
    </div>



@stop