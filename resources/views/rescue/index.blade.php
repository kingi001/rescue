@extends('adminlte::page')
@section('title', 'Admin Dashboard')
@section('content_header')

@stop
@section('content')
@include('sweetalert::alert')
<br>
<div class="container mt-2">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-right">
            <h5>Rescue Cases</h5>
            <a href="{{ route('admin.rescue_case.create') }}" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus-circle"></i> Add New Rescue Case
            </a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Case Title</th>
                        <th>Rescue Date</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Assigned Social Worker</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rescueCases as $rescueCase)
                        <tr>
                            <td>{{ $rescueCase->id }}</td>
                            <td>{{ $rescueCase->case_title }}</td>
                            <td>{{ $rescueCase->rescue_date }}</td>
                            <td>{{ $rescueCase->location }}</td>
                            <td>{{ $rescueCase->description }}</td>
                            <td>{{ $rescueCase->SocialWorker->name ?? 'N/A' }}</td>         
                            <td> 

                            <a href="#" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#details-{{ $rescueCase->id }}">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('admin.rescue_case.edit', $rescueCase->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.rescue_case.destroy', $rescueCase->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this rescue case?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        <tr class="collapse" id="details-{{ $rescueCase->id }}">
                            <td colspan="6">
                                <div class="card card-body">
                                    <strong>Case Title:</strong> {{ $rescueCase->case_title }}<br>
                                    <strong>Description:</strong> {{ $rescueCase->description }}<br>
                                    <strong>Assigned Social Worker:</strong> {{ $rescueCase->SocialWorker->name }}<br>

                                    <strong>Additional Info:</strong> {{ $rescueCase->additional_info ?? 'No additional information available.' }}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No rescue cases found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $rescueCases->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection