@extends('layouts.superadmin')

@section('content')

<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class=""></i> User</h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
      
        <!-- /.breadcrumb -->
    </div>


<div class="row">


<div class="col-md-12">
    <div class="white-box">

        <div class="row m-t-20">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body b-all border-radius">
                            <div class="row">
                                
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="{{asset('public/img/default-profile-3.png')}}" width="75" height="75" class="img-circle" alt="">
                                        </div>
                                        <div class="col-xs-9">
                                            <p>
                                                <span class="font-medium text-info font-semi-bold">{{ ucwords($data->name) }}</span>
                                                <br>

                                            </p>
                                            
            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7 b-l">
                                  

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
       

        <div class="col-md-12">

            <section>
                <div class="sttabs tabs-style-line">

                   

                    <div class="content-wrap">
                        <section id="section-line-1" class="show">
                            <div class="row">


<div class="white-box">
    <nav>
        <ul class="showClientTabs">
            <li class="clientProfile"><a href="{{ route('viewuser',['id'=>$data->id])  }}"><i class="icon-user"></i> <span>Profile</span></a>
            </li>
            <li class="clientProjects"><a href="{{ route('viewnominee',['id'=>$data->id])  }}"><i class="icon-layers"></i> <span>Nominee</span></a>
            </li>
          
        </ul>
    </nav>
</div>

                                <div class="col-md-12">
                                    <div class="white-box">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Full Name</strong> <br>
                                                <p class="text-muted">{{ ucwords($data->name)." ".ucwords($data->fathername) }}</p>

                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Email</strong> <br>
                                                <p class="text-muted">{{ $data->email }}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-6"> <strong>Mobile No</strong> <br>
                                                <p class="text-muted">{{ $client->phone ?? '-'}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                      @php
                                        if($data->gender){
                                        if($data->gender==1)
                                        $gender="Male";
                                        else
                                        $gender="Female";
                                       }
                                        @endphp
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Date Of Birth</strong> <br>
                                                <p class="text-muted">{{ $data->dob}}</p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Gender</strong> <br>
                                                <p class="text-muted">{{ $gender ?? '-' }}</p>
                                            </div>
                                          
                                        </div>
                                        <hr>
                                        @php
                                        $city=App\City::find($data->city);
                                        $district=App\District::find($data->district);
                                        $state=App\State::find($data->state);
                                        $country=App\Country::find($data->country);
                                        @endphp
                                        <div class="row">
                                            <div class="col-xs-6 b-r"> <strong>Address</strong> <br>
                                                <p class="text-muted">{{ $city->name.",".$district->name.",".$state->name.",".$country->name ?? '-' }}</p>
                                            </div>
                                           
                                        </div>

                                                                        </div>
                                </div>

                            </div>

                        </section>
                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
        </div>



    </div>
@endsection