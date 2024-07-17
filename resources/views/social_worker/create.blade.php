@extends('adminlte::page')
@section('title', 'Admin Dashboard')

@section('content')
@include('sweetalert::alert')
<br>
<div class="container mt-2">
    <div class="card">
        
        <div class="card-header">
            <h5>Add New Social Worker</h5>
        </div>
        
        <div class="card-body">
            <form action="{{ route('social_worker.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name" required placeholder="Enter Full Names">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm" name="email" id="email" required placeholder="Enter Email">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control form-control-sm" name="phone" id="phone" placeholder="Enter Phone Number">
                    </div>
                    <div class="col-md-6">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control form-control-sm" name="age" id="age" required placeholder="Age||years">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="years_of_service" class="form-label">Years of Service</label>
                        <input type="number" class="form-control form-control-sm" name="years_of_service" id="years_of_service" required placeholder="Years of Experience">
                    </div>
                </div>
                @role(admin)
                <button type="submit" class="btn btn-primary btn-sm">Add Social Worker</button>
                @endrole
            </form>
        </div>
    </div>
</div>

@stop