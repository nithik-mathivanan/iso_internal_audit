@extends('layouts.employee')
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
$employeecount=App\User::where('role',2)->count();
@endphp
           
          <!--   <div class="col-md-3 col-sm-6">
                <a href="#">
                    <div class="white-box">
                    <div class="row">
                        <div class="col-xs-3">
                            <div>
                                <span class="bg-success-gradient"><i class="icon-user"></i></span>
                            </div>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span class="widget-title"> Total Users</span><br>
                            <span class="counter">{{ $employeecount}}</span>
                        </div>
                    </div>
                    </div>
                </a>
            </div>
        -->

          <!--   <div class="col-md-3 col-sm-6">
                <a href="#">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-xs-3">
                                <div>
                                    <span class="bg-warning-gradient"><i class="icon-people"></i></span>
                                </div>
                            </div>
                            <div class="col-xs-9 text-right">
                                <span class="widget-title"> </span><br>
                                <span class="counter"></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->

         
           <!--  <div class="col-md-3 col-sm-6">
                <a href="#">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-xs-3">
                                <div>
                                    <span class="bg-danger-gradient"><i class="icon-layers"></i></span>
                                </div>
                            </div>
                            <div class="col-xs-9 text-right">
                                <span class="widget-title"> Total Documents</span><br>
                                <span class="counter">0</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->
            

          
        </div>
@endsection