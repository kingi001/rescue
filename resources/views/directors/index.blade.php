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
            <h5><i class="fas fa-user-tie"></i>  Directors</h5>
            <a href="{{ route('admin.directors.create') }}" class="btn btn-primary btn-sm float-right">
                <i class="fas fa-plus-circle"></i> Add Director
            </a>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($directors as $director)
                        <tr>
                            <td>{{ $director->id }}</td>
                            <td>{{ $director->name }}</td>
                            <td>{{ $director->email }}</td>
                            <td>{{ $director->phone_number }}</td>
                            <td>{{ $director->date_of_birth }}</td>
                            <td>{{ $director->gender }}</td>
                            <td>{{ $director->address }}</td>
                            <td>
                                <a href="{{ route('admin.directors.edit', $director->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.directors.destroy', $director->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $directors->links('pagination::bootstrap-4') }}
        </div>
    </div>
    @stop