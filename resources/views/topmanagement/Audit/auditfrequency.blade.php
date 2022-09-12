@extends('topmanagement.layouts.app')


@section('content')
 <div class="page-wrapper">
           
            <div class="row page-titles">
               <div class="col-md-5 align-self-center">
                  <h3 class="text-themecolor">Audit Frequency</h3>
               </div>
            </div>
           
            <div class="container-fluid">
             
              <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title">ANNUAL AUDIT PROGRAM</h4>
                         <form action="{{ route('auditfrequency1') }}" method="post" >							     @if(empty($errors))<div class="alert alert-danger">
                        <p>{{$errors}}</p>
                    </div> 
                @endif
                      <div class="row p-t-20">					  
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Frequency</label>{{ csrf_field() }}
                                                  <select class="form-control" name="frequency">
												<option value="">Select Frequency</option>
												<option value="annual">Annual</option>
												<option value="halfyearly">Half Yearly</option>
												<option value="quaterly">Quaterly</option>
												</select>
											</div>											
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Start MM-YY</label>{{ csrf_field() }}
                                                  <input type="month" class="form-control" placeholder="" name="month"></div>
                                            </div>
											
											
											<div class="col-md-6">
                                                <div class="form-group ">
											  <label class="control-label">Standard / Crieteria Ref</label>
											{{ csrf_field() }} 
@foreach($standard1 as $companystandard)
											<fieldset>
                                             <label class="custom-control custom-checkbox">
<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$companystandard->name}}"><span class="custom-control-label">{{$companystandard->name}}</span> </label>
                                          </fieldset>
@endforeach
											</div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group ">
											  <label class="control-label">Scope of Mgmt System</label>{{ csrf_field() }} @foreach($scope1 as $companyscope)
											<fieldset>
                                             <label class="custom-control custom-checkbox"><input type="checkbox" name="scope[]"  class="custom-control-input" aria-invalid="false" value="{{$companyscope->name}}"><span class="custom-control-label">{{$companyscope->name}}</span> </label>
                                          </fieldset>@endforeach
											</div>
                                            </div>
                                            <!--/span-->
                                        </div>
<input type="submit" class="btn btn-info"></form>
   </div>
                  </div>
               </div>
               <!-- ============================================================== -->
               <!-- End PAge Content -->
               <!-- ============================================================== -->
               <!-- ============================================================== -->
               <!-- Right sidebar -->
               <!-- ============================================================== -->
               <!-- .right-sidebar -->
               <div class="right-sidebar">
                  <div class="slimscrollright">
                     <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                     <div class="r-panel-body">
                        <ul id="themecolors" class="m-t-20">
                           <li><b>With Light sidebar</b></li>
                           <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                           <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                           <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                           <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                           <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                           <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                           <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                           <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                           <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                           <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                           <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                           <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                           <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                        </ul>
                        <ul class="m-t-20 chatonline">
                           <li><b>Chat option</b></li>
                           <li>
                              <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                           </li>
                           <li>
                              <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                           </li>
                           <li>
                              <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                           </li>
                           <li>
                              <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                           </li>
                           <li>
                              <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                           </li>
                           <li>
                              <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                           </li>
                           <li>
                              <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                           </li>
                           <li>
                              <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- ============================================================== -->
               <!-- End Right sidebar -->
               <!-- ============================================================== -->
            </div>
             </div>
           
             
            </div>
         

@endsection
