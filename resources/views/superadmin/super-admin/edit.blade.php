@extends('layouts.superadmin')
@section('content')
<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-8 col-md-5 col-sm-6 col-xs-12">
            <h4 class="page-title">Super Admin</h4>
        </div>   
          
</div>

<div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading">Super Admin Edit</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                            <div class="form-body">
                               <form method="POST" action="{{route('updatesuperadmin',['id'=>$post->id])}}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">Name</label>
                                            <input type="text" name="name" id="name" value="{{ $post->name ?? '' }}"  class="form-control">
                                             @if($errors->has('name'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div>                                     

                                      <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">Email</label>
                                            <input type="email" name="email" id="email" value="{{ $post->email ?? '' }}"  class="form-control">
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
                                            <input type="password" autocomplete="off" name="password" id="password"  class="form-control">
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
                                            <label class="required">Phone</label>
                                            <input type="text" name="phone" id="phone" value="{{ $post->phone ?? '' }}"  class="form-control">
                                              @if($errors->has('phone'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('phone')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div>


                               
                                    <!--/span-->
                                </div>

                                 <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection