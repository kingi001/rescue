@extends('adminlte::page')
@section('title', 'Admin Dashboard')
@section('content_header')
@stop
@section('content')
<br>
<div class="container mt-2">
<div class="card">
        <div class="card-header">
        <h5><i class="fas fa-child"></i> Add New Rescue Case</h5>
        </div>
        <div class="card-body">
   
    <form action="{{ route('admin.rescue_case.store') }}" method="POST">
        @csrf <!-- CSRF token for security -->

        <div class="form-group">
            <label for="caseTitle">Case Title</label>
            <input type="text" class=" form-control form-control-sm " id="caseTitle" name="caseTitle" placeholder="Enter case title" required>
        </div>
        
        <div class="form-group">
            <label for="rescueDate">Rescue Date</label>
            <input type="date" class=" form-control form-control-sm" id="rescueDate" name="rescueDate" required>
        </div>
        
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class=" form-control form-control-sm" id="location" name="location" placeholder="Enter location" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class=" form-control form-control-sm" id="description" name="description" rows="3" placeholder="Enter case description" required></textarea>
        </div>

        <div class="form-group">
            <label for="assignedSocialWorker">Assigned Social Worker</label>
            <select class=" form-control form-control-sm" id="assignedSocialWorker" name="assignedSocialWorker" required>
                <option value="">Select a social worker</option>
                @foreach ($socialWorkers as $worker)
                    <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Case</button>
        <a href="{{ route('admin.rescue_case.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</div>


@stop