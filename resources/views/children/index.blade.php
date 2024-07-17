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
            <h5><i class="fas fa-child"></i> Children Profiles</h5>
            <a href="{{ route('admin.children.create') }}" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus-circle"></i> Add New Child Profile
            </a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Social Worker</th>
                        <th>Rescue Case</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($children as $child)
                    <tr>
                        <td>{{ $child->id }}</td>
                        <td>{{ $child->first_name }}</td>
                        <td>{{ $child->last_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($child->date_of_birth)->format('Y-m-d') }}</td>
                        <td>{{ ucfirst($child->gender) }}</td>
                        <td>{{ $child->assignedSocialWorker->name ?? 'N/A' }}</td>
                        <td>{{ $child->rescueCase->case_title ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.children.edit', $child) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.children.destroy', $child) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this child?');">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                            
                            <a href="#" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#details-{{ $child->id }}">
                            <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    <tr class="collapse" id="details-{{ $child->id }}">
                            <td colspan="6">
                                <div class="card card-body">
                                    <strong>First Name:</strong> {{ $child->first_name }}<br>
                                    <strong>Last Name:</strong> {{ $child->last_name }}<br>
                                    <strong>date_of_birth:</strong> {{ \Carbon\Carbon::parse($child->date_of_birth)->format('Y-m-d')}}<br>
                                    <strong>Medical History:</strong> {{ $child->medical_history}}<br>



                                    <strong>Additional Info:</strong> {{ $child->additional_info ?? 'No additional information available.' }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $children->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@stop