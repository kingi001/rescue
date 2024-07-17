@extends('adminlte::page')
@section('title', 'Admin Dashboard')

@section('content')
@include('sweetalert::alert')
<br>
<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            <h5>Edit Social Worker</h5>
        </div>
        <div class="card-body">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{ route('social_worker.update', $socialWorker->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{ $socialWorker->name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm" name="email" id="email" value="{{ $socialWorker->email }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control form-control-sm" name="phone" id="phone" value="{{ $socialWorker->phone }}">
                    </div>
                    <div class="col-md-6">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control form-control-sm" name="age" id="age" value="{{ $socialWorker->age }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select form-select-sm" name="gender" id="gender" required>
                            <option value="male" {{ $socialWorker->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $socialWorker->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $socialWorker->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="years_of_service" class="form-label">Years of Service</label>
                        <input type="number" class="form-control form-control-sm" name="years_of_service" id="years_of_service" value="{{ $socialWorker->years_of_service }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@stop