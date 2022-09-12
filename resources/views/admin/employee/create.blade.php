@extends('layouts.admin')
@section('content')
<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-8 col-md-5 col-sm-6 col-xs-12">
            <h4 class="page-title">Employee</h4>
        </div>   
        	
</div>

<div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading">Employee Create</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                            <div class="form-body">
                               <form method="POST" action="{{route('admin.employees.store')}}">
                               	@csrf
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">Employee Name</label>
                                            <input type="text" name="name" id="name"  value="{{ $post->name ?? '' }}"   class="form-control">
                                            @if($errors->has('name'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div>

                                     <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Employee Father Name</label>
                                            <input type="text" name="father_name" id="father_name"  value="{{ $post->father_name ?? '' }}"   class="form-control">
                                            @if($errors->has('father_name'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('father_name')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div>
                                    </div> 

                                    <div class="row">

                                       <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                              <option selected hidden disabled>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                             @if($errors->has('gender'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('gender')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div> 

                                     <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">Date of Birth</label>
                                            <input type="text" autocomplete="off"  name="dob" id="dob" class="form-control">
                                             @if($errors->has('dob'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('dob')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div> 

                                    </div>

                                      <div class="row">
                                     <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">Employee Phone Number</label>
                                            <input type="text" name="phone" id="phone"  value="{{ $post->phone ?? '' }}"   class="form-control">
                                             @if($errors->has('phone'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('phone')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div>    

                                      <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">Employee Email</label>
                                            <input type="email" name="email" id="email"  value="{{ $post->email ?? '' }}"   class="form-control">
                                             @if($errors->has('email'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('email')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div> 
                                          </div> 
                                          

                                       <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">Password</label>
                                            <input type="password" autocomplete="off" name="password" id="password"  value="{{ $post->password ?? '' }}"   class="form-control">
                                              @if($errors->has('password'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('password')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div>

                                      <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">Confirm Password</label>
                                            <input type="password" autocomplete="off" name="password_confirmation" value="{{ $post->password_confirmation ?? '' }}"   class="form-control">
                                        </div>
                                    </div>  
                                       </div>                                   

                                       <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                           <label class="required control-label">Street Address</label>
                                            <textarea name="streetaddress"  id="streetaddress"  rows="5" value="" class="form-control"></textarea>
                                             @if($errors->has('streetaddress'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('streetaddress')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div>
                                                           
                                     <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">Zipcode</label>
                                            <input type="text" name="zipcode" id="zipcode"  value="{{ $post->zipcode ?? '' }}"   class="form-control">
                                             @if($errors->has('zipcode'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('zipcode')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div>

                                  </div>

                                 <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{route('admin.employees.index')}}" class="btn btn-info">Back</a>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection


@section('script')
<script type="text/javascript">

  $("#dob").datepicker({
        todayHighlight: true,
        autoclose: true,
   format: 'yyyy-mm-dd'
    });
</script>
@endsection