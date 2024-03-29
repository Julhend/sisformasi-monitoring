@extends('layouts.master')

@section('top')
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ \App\DigitalCaliper::count() + \App\ThreadGauge::count() + \App\OutsideDial::count() }}</h3>

                    <p>TOTAL ALAT UKUR</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-albums-outline"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ \App\User::count() }}<sup style="font-size: 20px"></sup></h3>

                    <p>TOTAL USER</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                {{-- <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3> {{ DB::table('users')->where('role', 'staff')->count() }}</h3>
                    <p>TOTAL CALIBRATOR</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                {{-- <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ DB::table('calibrasi_digital_caliper')->where('disposition', 'pending')->count() +
                        DB::table('calibrasi_outside_dial_micrometer')->where('disposition', 'pending')->count() +
                        DB::table('calibrasi_thread_gauge')->where('disposition', 'pending')->count() }}
                    </h3>
                    <p>TOTAL ALAT UKUR BELUM DIKALIBRASI</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                {{-- <a href="{{ route('customers.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection

@section('top')
@endsection









{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
{{-- <div class="container"> --}}
{{-- <div class="row justify-content-center"> --}}
{{-- <div class="col-md-8"> --}}
{{-- <div class="card"> --}}
{{-- <div class="card-header">Dashboard</div> --}}

{{-- <div class="card-body"> --}}
{{-- @if (session('status')) --}}
{{-- <div class="alert alert-success" role="alert"> --}}
{{-- {{ session('status') }} --}}
{{-- </div> --}}
{{-- @endif --}}

{{-- You are logged in! --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
{{-- @endsection --}}
