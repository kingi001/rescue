@extends('adminlte::page')
@section('title', 'Admin Dashboard')
@section('content_header')
    <h1 style="font-family: 'poppins', sans-serif; font-weight: 400; color: #333;"><center>Rescue Centre Admin Dashboard </center></h1>
@stop
@section('content')
@include('sweetalert::alert')


<body>
    <div class="container mt-5">
    <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-users fa-2x text-info"></i>
                            <div class="ml-3">
                                <h5 class="card-title">Total Rescues</h5>
                                <h3 class="card-text">200</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-tasks fa-2x text-danger"></i>
                            <div class="ml-3">
                                <h5 class="card-title">Pending Cases</h5>
                                <h3 class="card-text">10</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-chart-line fa-2x text-success"></i>
                            <div class="ml-3">
                                <h5 class="card-title">Success Rate</h5>
                                <h3 class="card-text">95%</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row">
            
            <!-- Directors Card -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-tie fa-2x text-primary"></i>
                            <div class="ml-3">
                                <h5 class="card-title">Directors</h5>
                                <h3 class="card-text" id="directors-count">5</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="admin/directors" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Social Workers Card -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-nurse fa-2x text-success"></i>
                            <div class="ml-3">
                                <h5 class="card-title">Social Workers</h5>
                                <h3 class="card-text" id="social-workers-count">15</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="admin/social" class="btn btn-success">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Children Card -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-child fa-2x text-warning"></i>
                            <div class="ml-3">
                                <h5 class="card-title">Children</h5>
                                <h3 class="card-text" id="children-count">50</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="children.html" class="btn btn-warning">View Details</a>
                    </div>
                </div>
            </div>
        </div>




        
       
@stop

