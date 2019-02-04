@extends('main')

@section('titlle','| homepage')



@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
    </ol>

    <!-- Icon Cards-->
    <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-fw fa-building"></i>
            </div>
            <div class="mr-5">{{$data['cc']}} Collegs</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('/colleges')}}">
            <span class="float-left">View Details</span>
            <span class="float-right">
            <i class="fas fa-angle-right"></i>
            </span>
        </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-fw fa-store"></i>
            </div>
            <div class="mr-5">{{$data['dc']}} Departmens</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('/depts')}}">
            <span class="float-left">View Details</span>
            <span class="float-right">
            <i class="fas fa-angle-right"></i>
            </span>
        </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-fw fa-user-tie"></i>
            </div>
            <div class="mr-5">{{$data['gc']}} Guides</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('/guides')}}">
            <span class="float-left">View Details</span>
            <span class="float-right">
            <i class="fas fa-angle-right"></i>
            </span>
        </a>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-fw fa-user-graduate"></i>
            </div>
            <div class="mr-5">{{$data['sc']}} Scholars</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{url('/scholars')}}">
            <span class="float-left">View Details</span>
            <span class="float-right">
            <i class="fas fa-angle-right"></i>
            </span>
        </a>
        </div>
    </div>
    </div>

@endsection

