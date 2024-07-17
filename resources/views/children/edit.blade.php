@extends('adminlte::page')
@section('title', 'Admin Dashboard')
@section('content_header')
@stop
@section('content')
<br>
<div class="container mt-2">
<div class="card">
        <div class="card-header">
        <h5><i class="fas fa-child"></i> Edit Child Profile</h5>
        </div>
        <div class="card-body">
        <form action="{{ route('admin.children.update', $child->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $child->first_name) }}" required>
                        @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $child->last_name) }}" required>
                        @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth', $child->date_of_birth) }}" required>
                        @error('date_of_birth')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="male" {{ old('gender', $child->gender) == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', $child->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender', $child->gender) == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $child->address) }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number', $child->contact_number) }}" maxlength="15">
                        @error('contact_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="medical_history">Medical History</label>
                        <textarea name="medical_history" id="medical_history" class="form-control">{{ old('medical_history', $child->medical_history) }}</textarea>
                        @error('medical_history')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="assigned_social_worker_id">Assigned Social Worker</label>
                        <select name="assigned_social_worker_id" id="assigned_social_worker_id" class="form-control">
                            <option value="" disabled>Select Social Worker</option>
                            @foreach ($socialWorkers as $worker)
                                <option value="{{ $worker->id }}" {{ old('assigned_social_worker_id', $child->assigned_social_worker_id) == $worker->id ? 'selected' : '' }}>{{ $worker->name }}</option>
                            @endforeach
                        </select>
                        @error('assigned_social_worker_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="rescue_case_id">Rescue Case</label>
                        <select name="rescue_case_id" id="rescue_case_id" class="form-control">
                            <option value="" disabled>Select Rescue Case</option>
                            @foreach ($rescueCases as $case)
                                <option value="{{ $case->id }}" {{ old('rescue_case_id', $child->rescue_case_id) == $case->id ? 'selected' : '' }}>{{ $case->case_title }}</option>
                            @endforeach
                        </select>
                        @error('rescue_case_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Update Child</button>
                <a href="{{ route('admin.children.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@stop