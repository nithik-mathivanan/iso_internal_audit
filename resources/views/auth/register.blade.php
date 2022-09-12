@extends('layouts.register')

@section('content')
@php
 $package= App\Package::all();
$tools=App\Tool::where('status',1)->get();
@endphp
 <center> <h2>Register</h2></center>
<div class="container">
        <div class="col-md-12">
                 <div class="app">
        <div class="bg"></div>
                    <form method="POST" action="{{ route('registerstore') }}">
                        @csrf
                        <div class="col-md-12">
                        <div class="col-md-6">
                        <div class="form-group required  row">
                            <label for="name" class="required col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="email" class="required col-md-4 col-form-label text-md-right">{{ __('Company E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                         <div class="col-md-12">
                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password" class="required col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                        <div class="col-md-6">
                        <div class="form-group row">
                            <label for="password-confirm" class="required col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                </div>  

                          <div class="col-md-12">
                        <div class="col-md-6">
                         <div class="form-group row">
                            <label for="phone" class="required col-md-4 col-form-label text-md-right">{{ __('Company Phone Number') }}</label>

                            <div class="col-md-8">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                        <div class="col-md-6">
                         <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Company Website') }}</label>

                            <div class="col-md-8">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" autocomplete="website">

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                      <div class="col-md-12">
                        <div class="col-md-6">
                        <div class="form-group row">
                                <label for="exampleInputPassword1" class="col-md-4 col-form-label text-md-right">Company Logo</label>

                            <div class="col-md-8">
                                <!-- <span class="btn btn-info btn-file">
                                    <span class="fileinput-new"> Select Image </span>
                                    <span class="fileinput-exists"> Change </span> -->
                                        <input type="file" name="logo" class="form-control"  id="logo" >
                                       <!--   </span> -->
                                    </div>
                                    </div>
                                </div>

                        <div class="col-md-6">
                                <div class="form-group row">                 
                                <label for="streetaddress" class="required col-md-4 col-form-label text-md-right">Street Address</label>
                                <div class="col-md-8">                              
                            <textarea name="streetaddress"  id="streetaddress"  rows="5" value="" class="form-control @error('streetaddress') is-invalid @enderror"> </textarea>                                               @error('streetaddress')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror              
                        </div>
                            </div>
                        </div>
                    </div>

                              <div class="col-md-12">
                        <div class="col-md-6">
                             <div class="form-group row">
                            <label for="zipcode" class="required col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}</label>

                            <div class="col-md-8">
                                <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') }}" autocomplete="zipcode">

                                @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                            
                        <div class="col-md-6">        
                        <div class="form-group row">                                                            <label class="required col-md-4 col-form-label text-md-right">Package</label>   
                        <div class="col-md-8">                                
                        <select name="package" class="form-control" id="package">                                                   <option selected hidden disabled="">Select Package</option>                                                  @foreach($package as $list)                                                                                        <option value="{{$list->id}}">{{$list->name}}</option>                                             @endforeach                                         
                           </select>                                                           @if($errors->has('package'))                                                                                       <span class="invalid-feedback">                                                                                                 <strong>{{$errors->first('package')}}</strong>                                                                                              </span>                                                                                         @endif   
                           </div>                                              
                       </div>  
                       </div>
                       </div>     

                         <div class="col-md-12">
                        <div class="col-md-6">
                        <div class="form-group row">                         
                            <label class="required col-md-4 col-form-label text-md-right">Pay By</label>
                            <div class="col-md-8">     
                            <select name="paytype" class="form-control" id="paytype">                             
                              <option selected hidden disabled="">Select Package</option>     
                              <option value="1">Annual</option>                     <option value="2">Monthly</option>        
                             </select>                                              @if($errors->has('paytype'))                             <span class="invalid-feedback">                      <strong>{{$errors->first('paytype')}}</strong>        </span>                                     @endif                                       
                                 </div>                                     
                                </div>  
                                </div>
                                </div>  

                             <div class="row packageinfo">    
                                <h3>Pakcage Info</h3>      
                                <table class="table">    
                                    <tr><td>Package Name</td><td>Description</td><td>Max Storage Size</td><td>Max File Size</td><td>Annual Price</td><td>Monthly Price</td><td>Max Employees</td></tr>
                                <tbody class="packcontent"></tbody>
                                        </table>
                                </div>                               
                                   
                                    <div class="row">
                                    <h2><label class="required">Modules</label></h2>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class=" col-md-2">
                                                 
                                                <input id="select_all_permission"

                                                        class="select_all_permission" type="checkbox">
                                                         <label for="select_all_permission">Select All</label>
                                               
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row form-group module-in-package">
                                            @php
                                            $inc=1;
                                            @endphp
                                            @foreach($tools as $list)
                                           <div class="col-md-2">
                                             
                                                <input id="{{ $list->name }}" data-inc="{{$inc}}" name="module_in_package[{{ $list->id }}]" value="{{ $list->id }}" class="module_checkbox" type="checkbox">
                                                       <label for="{{ $list->name }}">{{ ucfirst($list->name) }} ( Price : <span class="moduleamount{{$inc}}">{{$list->price}}</span> )</label>
                                                    </div>
                                            @php
                                            $inc++
                                            @endphp
                                            @endforeach
                                             @if($errors->has('module_in_package'))                             <span class="invalid-feedback">                      <strong>{{$errors->first('module_in_package')}}</strong>        </span>                                     @endif 
                                        </div>
                                    </div>

                                </div>
                               
                                <div class="col-md-12">
                        <div class="col-md-6">
                               <div class="row">
                                    <div class="form-group">
                                        <label class="required col-md-4 col-form-label text-md-right">Modules Total Amount</label>
                                         <div class="col-md-8">  
                                            <input type="text" readonly="true" name="tools_totalamount" id="tot"  value="0"   class="form-control">
                                        @if($errors->has('tools_totalamount'))
                                        <span class="invalid-feedback">
                                         <strong>{{$errors->first('tools_totalamount')}}</strong>
                                         </span>
                                         @endif
                                    </div>
                                </div>  
                                </div>  
                            </div>
                        </div>

                        <div class="col-md-12"> 
                            <div class="col-md-4"> </div>
                            <div class="col-md-4"> 
                        <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                             </div> 
                         </div>
                     </div>
                        </div>
                    </form>
                
   
</div>
@endsection

@section('script')
<script type="text/javascript">
$('.packageinfo').hide();
    $(function() {
        
            $('#package').on('change',function(event){
                    var packid=$(this).val();
                    $.ajax({
                        url:"{{ route('registerpackage')}}" ,
                        type: 'GET',
                            data: {
                             packid:packid,
                            },success: function(data){ 
                                console.log(data);
                                $('.packcontent').html(data);  
                                $('.packageinfo').show();
                                /*$('.top-right').notify({
                                    message: { text: "Company Deleted Successfully" }
                                }).show();                
                                $('#companytable').DataTable().ajax.reload();*/
                        },
                    });
            });

    });

           function totalamount(type,amount){
        amount=parseFloat(amount)
        examount=parseFloat($('#tot').val());
        
        if(type==1){
            $('#tot').val(amount+examount);
        }else if(type==2){
            $('#tot').val(examount-amount);
        }

    }


    $( ".module_checkbox" ).each(function( index ) {
        if($(this).is(':checked')){
            var getid=$(this).attr('data-inc');
            var getamount=$('.moduleamount'+getid).html();
            totalamount(1,getamount);
        }
    });

    if($('.module_checkbox').not(':checked').length > 0 == false){
        $('.select_all_permission').prop('checked', true);
    }else{
        $('.select_all_permission').prop('checked', false);
    }

    $('.select_all_permission').change(function () {
        
        $('#tot').val(0);

        if($(this).is(':checked')){
            $('.module_checkbox').prop('checked', true);
            
            $( ".module_checkbox" ).each(function( index ) {
                var getid=$(this).attr('data-inc');
                var getamount=$('.moduleamount'+getid).html();
                totalamount(1,getamount);
            });

        }else {
            
            $('.module_checkbox').prop('checked', false);
        }
    });



    $('.module_checkbox').change(function () {
            var getid=$(this).attr('data-inc');
            if($(this).is(':checked')){
                var getamount=$('.moduleamount'+getid).html();
                //alert(getamount);
                totalamount(1,getamount);
            }else{
                var getamount=$('.moduleamount'+getid).html();
                //alert(getamount);
                totalamount(2,getamount);
            }


        if($('.module_checkbox').not(':checked').length > 0 == false){
            $('.select_all_permission').prop('checked', true);
        }else{
            $('.select_all_permission').prop('checked', false);
        }


    });
</script>
@endsection
