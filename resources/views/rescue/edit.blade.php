@extends('adminlte::page')
@section('title', 'Admin Dashboard')
@section('content_header')
@stop
@section('content')
<br>
<div class="container mt-2">
<div class="card">
        <div class="card-header">
        <h5><i class="fas fa-child"></i> Edit Rescue Case</h5>
        </div>
        <div class="card-body">
        <form action="{{ route('admin.rescue_case.update', $rescueCase->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="case_title">Case Title</label>
                        <input type="text" name="case_title" class="form-control" id="case_title" value="{{ $rescueCase->case_title }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="rescue_date">Rescue Date</label>
                        <input type="date" name="rescue_date" class="form-control" id="rescue_date" value="{{ $rescueCase->rescue_date }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" id="location" value="{{ $rescueCase->location }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="assigned_social_worker_id">Assigned Social Worker</label>
                        <select name="assigned_social_worker_id" class="form-control" id="assigned_social_worker_id" required>
                            @foreach($socialWorkers as $worker)
                                <option value="{{ $worker->id }}" {{ $rescueCase->assigned_social_worker_id == $worker->id ? 'selected' : '' }}>{{ $worker->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" required>{{ $rescueCase->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Rescue Case</button>
            </form>
        </div>
</div>
</div>


@stop