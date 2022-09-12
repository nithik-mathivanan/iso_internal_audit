@extends('company.layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
          <script src="http://code.jquery.com/jquery-1.11.0.js"></script>

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

                         <form action="{{ route('auditfrequency1') }}" method="post" >

		@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
 @if(empty($errors))
<div class="alert alert-danger">
                        <p>{{$errors}}</p>
                    </div> 
                @endif

                      <div class="row p-t-20">
					  
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Select Frequency</label>
{{ csrf_field() }}
                                    <select class="form-control" name="frequency" value="" >
												<option value="">Select Frequency </option>
												<option value="annual" @if (old('frequency') == 'annual') selected="selected" @endif >Annual</option>
												<option value="halfyearly" @if (old('frequency') == 'halfyearly') selected="selected" @endif >Half Yearly</option>
												<option value="quaterly" @if (old('frequency') == 'quaterly') selected="selected" @endif>Quaterly</option>
												</select>
											</div>
											
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Start MM-YY </label>

                                                  <input type="month" class="form-control datepicker" placeholder="" name="month" value="{{old('month') }}" id="month" ></div>
                                            </div>
											
											
											<div class="col-md-6">
                                                <div class="form-group ">
											  <label class="control-label">Standard / Crieteria Ref</label>
											
@foreach($standard1 as $companystandard)
											<fieldset>
                                             <label class="custom-control custom-checkbox">
<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$companystandard->name}}"   ><span class="custom-control-label">{{$companystandard->name}}</span> </label>
                                          </fieldset>
@endforeach
											</div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group ">
											  <label class="control-label">Scope of Mgmt System</label>

@foreach($scope1 as $companyscope)
											<fieldset>
                                             <label class="custom-control custom-checkbox">
<input type="checkbox" name="scope[]"  class="custom-control-input" aria-invalid="false" value="{{$companyscope->name}}"><span class="custom-control-label">{{$companyscope->name}}</span> </label>
                                          </fieldset>
@endforeach
											</div>
                                            </div>
                                            <!--/span-->
                                        </div>
<input type="submit" class="btn btn-info"></form>
   </div>
                  </div>
               </div>
               
            </div>
             </div>
           
             
            </div>

@endsection
