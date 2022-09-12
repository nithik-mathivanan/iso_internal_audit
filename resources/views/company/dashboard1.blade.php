@extends('company.layouts.app')
@section('content')
<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class=""></i> Dashboard</h4>
        </div>
        <!-- /.page title -->
    </div>
 <div class="row dashboard-stats front-dashboard">

@php
$employeecount=App\User::where('role',4)->count();
@endphp
      
          
        </div>
@endsection