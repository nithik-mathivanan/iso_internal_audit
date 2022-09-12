@extends('layouts.superadmin')
@section('content')
@php
	$data=App\Package::all();
	$company=App\Company::find($post->company_id);
@endphp
<div class="row bg-title">
				<!-- .page title -->
				<div class="col-lg-8 col-md-5 col-sm-6 col-xs-12">
						<h4 class="page-title">Company</h4>
				</div>   
					
</div>

<div class="row">
				<div class="col-md-12">

						<div class="panel panel-inverse">
								<div class="panel-heading">Company Edit</div>
								<div class="panel-wrapper collapse in" aria-expanded="true">
										<div class="panel-body">
														<div class="form-body">
																 <form method="POST" action="{{route('updatecompany',['id'=>$post->id])}}">
																@csrf
																@method('put')
																<div class="row">
																		<div class="col-md-6 ">
																				<div class="form-group">
																						<label class="required">Company Name</label>
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
																						<label class="required">Company Email</label>
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
																						<input type="password" autocomplete="off" name="password" id="password"  value="{{ $post->opensource ?? '' }}"   class="form-control">
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
																						<input type="password" autocomplete="off" name="password_confirmation" value="{{ $post->opensource ?? '' }}"   class="form-control">
																				</div>
																		</div>  
																			 </div>                                   

																			 <div class="row">
																		 <div class="col-md-6 ">
																				<div class="form-group">
																						<label class="required">Company Phone Number</label>
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
																						<label >Company Website</label>
																						<input type="text" name="website" id="website"  value="{{ $post->website ?? '' }}"   class="form-control">
																				</div>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-6">
																		<div class="form-group">
																				<label for="exampleInputPassword1">Company Logo</label>

																				<div class="col-md-12">
																						<div class="fileinput fileinput-new" data-provides="fileinput">
																								<div class="fileinput-new thumbnail"
																										 style="width: 250px; height: 80px;">

																										<img src="" alt=""/>
																								</div>
																								<div class="fileinput-preview fileinput-exists thumbnail"
																										 style="width: 250px; height: 80px;"></div>
																								<div>
																<span class="btn btn-info btn-file">
																		<span class="fileinput-new"> Select Image </span>
																		<span class="fileinput-exists"> Change </span>
																		<input type="file" name="logo" id="logo"> </span>
																										<a href="javascript:;" class="btn btn-danger fileinput-exists"
																											 data-dismiss="fileinput"> Remove </a>
																								</div>
																						</div>

																				</div>
																		</div>
																</div>

																		<div class="col-md-6 ">
																				<div class="form-group">
																					 <label class="required control-label">Street Address</label>
																						<textarea name="streetaddress"  id="streetaddress"  rows="5" value="" class="form-control">{{$post->streetaddress}}</textarea>
																						 @if($errors->has('streetaddress'))
									 <span class="invalid-feedback">
										<strong>{{$errors->first('streetaddress')}}</strong>
										</span>
										@endif
																				</div>
																		</div>
																	</div>

																	<div class="row">

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

																		 <div class="col-md-6">
																				<div class="form-group">
																						<label class="control-label required">Package</label>
																						<select name="package" class="form-control" id="package">
																							<option selected hidden disabled="">Select Package</option>
																							 @foreach($data as $package)
																							<option value="{{$package->id}}" @if(old('package',$company->package_id ?? null)==$package->id)
																																		{{ 'selected' }} @endif>{{$package->name}}</option>
																							 @endforeach
																						</select>
																						 @if($errors->has('package'))
									 <span class="invalid-feedback">
										<strong>{{$errors->first('package')}}</strong>
										</span>
										@endif
																				</div>
																		</div>


																	</div>
															 


																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																				<label class="control-label required">Pay By</label>
																				<select name="paytype" class="form-control" id="paytype">
																					 @if($company->paytype==1)
																					 <option value="1" selected="selected">Annual</option>
																					 <option value="2">Monthly</option>
																					 @elseif($company->paytype==2)
																						 <option value="1">Annual</option>
																						 <option value="2" selected="selected">Monthly</option>
																						@endif
																				</select>
																				 @if($errors->has('paytype'))
																						<span class="invalid-feedback">
																							<strong>{{$errors->first('paytype')}}</strong>
																						</span>
																					@endif
																		</div>
																	</div>

																</div>
															
																<div class="row packageinfo">
																	<h3>Pakcage Info</h3>
																	<table class="table">
																		<tr><td>Modules</td><td>Modules Total Amount</td><td>Description</td><td>Max Storage Size</td><td>Max File Size</td><td>Annual Price</td><td>Monthly Price</td><td>Max Employees</td></tr>
																		<tbody class="packcontent"></tbody>
																	</table>
																</div>

																	<h3>Modules</h3>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div class="checkbox checkbox-info  col-md-10">
												<input id="select_all_permission"

														class="select_all_permission" type="checkbox">
												<label for="select_all_permission">Select All</label>
											</div>
										</div>
									</div>
								</div>
								@php

								$tools_id=explode(',',$company->tools_id)

								@endphp

								<hr>
								<div class="row">
									<div class="col-xs-12">
										<div class="row form-group module-in-package">
											@php
											$inc=1;
											@endphp
											
											@foreach($tools as $list)
												<div class="col-md-2">
													<div class="checkbox checkbox-inline checkbox-info m-b-10">
														<input id="{{ $list->name }}" data-inc="{{$inc}}" name="module_in_package[{{ $list->id }}]" value="{{ $list->id }}" class="module_checkbox" type="checkbox"  
														@if( in_array($list->id, $tools_id) ) checked="1" @endif / >
														<label for="{{ $list->name }}">{{ ucfirst($list->name) }} ( Price : <span class="moduleamount{{$inc}}">{{$list->price}}</span> )</label>
													</div>
												</div>
												@php
												$inc++
												@endphp
											@endforeach
										</div>
									</div>
								</div>
							   
<div class="row">
							   <div class="col-md-6 ">
									<div class="form-group">
										<label class="control-label required">Modules Total Amount</label>
										<input type="text" readonly="true" name="tools_totalamount" id="tot"  value="{{ $company->tools_totalamount ?? '' }}"   class="form-control">
										@if($errors->has('tools_totalamount'))
										<span class="invalid-feedback">
										 <strong>{{$errors->first('tools_totalamount')}}</strong>
										 </span>
										 @endif
									</div>
								</div>
							</div>
													 
														 

																 <div class="form-actions">
																<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
																<a href="{{route('company')}}" class="btn btn-info">Back</a>
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
	
	$('.packageinfo').hide();
	$(function() {


			 var packid=$('#package').val();
			 if(packid){
					$.ajax({
						url:"{{ route('packagelist')}}" ,
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
			}

		
			$('#package').on('change',function(event){
					var packid=$(this).val();
					$.ajax({
						url:"{{ route('packagelist')}}" ,
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