@extends('layouts.superadmin')

@push('head-script')
<link rel="stylesheet" href="{{ asset('public/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/plugins/bower_components/switchery/dist/switchery.min.css') }}">
	<style>
		.m-b-10{
			margin-bottom: 10px;
		}
	</style>
@endpush

@section('content')

	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-inverse">
				<div class="panel-heading">Package Edit</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
					   <form method="POST" action="{{route('updatepackage',['id'=>$post->id])}}">
						@csrf
						@method('PUT')
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label required">Name</label>
											<input type="text" id="name" name="name" value="{{ $post->name ?? '' }}" class="form-control" >
											  @if($errors->has('name'))
											  <span class="invalid-feedback">
											  <strong>{{$errors->first('name')}}</strong>
											  </span>
											  @endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										<label class="control-label required">Max Employees</label>
											<input type="number" name="max_employees" id="max_employees" value="{{ $post->max_employees ?? '' }}"  class="form-control">
											  @if($errors->has('max_employees'))
											 <span class="invalid-feedback">
											  <strong>{{$errors->first('max_employees')}}</strong>
											  </span>
											  @endif
										</div>
									</div>
								</div>

								 <h3 class="box-title">Storage </h3>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label required">Max Storage Size</label>
											<input type="number" min="-1" id="max_storage_size" name="max_storage_size" value="{{ $post->max_storage_size ?? '' }}" class="form-control" >
											<p class="text-bold">Set -1 for unlimited storage size</p>
											 @if($errors->has('max_storage_size'))
											<span class="invalid-feedback">
											 <strong>{{$errors->first('max_storage_size')}}</strong>
											 </span>
											 @endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label required">Storage Unit</label>
											<select name="storage_unit" id="storage_unit" class="form-control">
												<option value="mb" @if(old('storage_unit',$post->storage_unit ?? null)=="mb")
																	{{ 'selected' }} @endif>MB</option>
												<option value="gb" @if(old('storage_unit',$post->storage_unit ?? null)=="gb")
																	{{ 'selected' }} @endif>GB</option>
											</select>
											 @if($errors->has('storage_unit'))
											<span class="invalid-feedback">
											 <strong>{{$errors->first('storage_unit')}}</strong>
											 </span>
											 @endif
										</div>
									</div>
								</div>

								 <h3 class="box-title">Price </h3>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label required">Annual Price</label>
											<input type="number" name="annual_price" id="annual_price" value="{{ $post->annual_price ?? '' }}"  class="form-control">
											@if($errors->has('annual_price'))
											<span class="invalid-feedback">
											 <strong>{{$errors->first('annual_price')}}</strong>
											 </span>
											 @endif
										</div>
									</div>
									<div class="col-md-6 ">
										<div class="form-group">
											<label class="control-label required">Monthly Price</label>
											<input type="number" name="monthly_price" id="monthly_price"  value="{{ $post->monthly_price ?? '' }}"   class="form-control">
											@if($errors->has('monthly_price'))
											<span class="invalid-feedback">
											 <strong>{{$errors->first('monthly_price')}}</strong>
											 </span>
											 @endif
										</div>
									</div>
								</div>

								<h3 class="box-title">Modules</h3>

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

								$tools_id=explode(',',$post->tools_id)

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
							   

							   <div class="col-md-6 ">
									<div class="form-group">
										<label class="control-label required">Modules Total Amount</label>
										<input type="text" readonly="true" name="tools_totalamount" id="tot"  value="{{ $post->tools_totalamount ?? '' }}"   class="form-control">
										@if($errors->has('tools_totalamount'))
										<span class="invalid-feedback">
										 <strong>{{$errors->first('tools_totalamount')}}</strong>
										 </span>
										 @endif
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label class="control-label">Description</label>
											<textarea name="description"  id="description"  rows="5" value="" class="form-control">{{ $post->description ?? '' }}</textarea>
											@if($errors->has('description'))
											 <span class="invalid-feedback">
											  <strong>{{$errors->first('description')}}</strong>
											  </span>
											  @endif
										</div>
									</div>

								</div>

							</div>
							<div class="form-actions">
								<button type="submit" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>    <!-- .row -->
@endsection

@section('script')
<script src="{{ asset('public/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/plugins/bower_components/switchery/dist/switchery.min.js') }}"></script>

<script type="text/javascript">

	function totalamount(type,amount){
		amount=parseFloat(amount)
		examount=parseFloat($('#tot').val());
		
		if(type==1){
			$('#tot').val(amount+examount);
		}else if(type==2){
			$('#tot').val(examount-amount);
		}

		//console.log('tot_amount'+$('#tot').val());
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