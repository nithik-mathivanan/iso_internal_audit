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
				<div class="panel-heading">Designation Edit</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
					   <form method="POST" action="{{route('updatedesignation',['id'=>$designation->id])}}">
						@csrf
						@method('PUT')
							<div class="form-body">
								<div class="row">
									<div class="col-md-6 col-md-offset-3">
										<div class="form-group">
											<label class="control-label required">Name</label>
											<input type="text" id="name" name="name" value="{{ $designation->name ?? '' }}" class="form-control" >
											  @if($errors->has('name'))
											  <span class="invalid-feedback">
											  <strong>{{$errors->first('name')}}</strong>
											  </span>
											  @endif
										</div>
									
										<div class="form-group">
                                            <label class="control-label required">Status</label>
                                            <select name="status" id="status" class="form-control">
                                               @if($designation->status==1)
                                                <option value="1" selected="selected">Active</option>
                                                <option value="0">Inactive</option>
                                                @elseif($designation->status==0)
                                                <option value="1">Active</option>
                                                <option value="0" selected="selected">Inactive</option>
                                                @endif
                                            </select>
                                             @if($errors->has('status'))
                                               <span class="invalid-feedback">
                                                <strong>{{$errors->first('status')}}</strong>
                                                </span>
                                                @endif
                                        </div>
								</div>
							</div>
							<div class="form-actions" style="text-align: center;">
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
 $('.select_all_permission').change(function () {
		if($(this).is(':checked')){
			$('.module_checkbox').prop('checked', true);
		} else {
			$('.module_checkbox').prop('checked', false);
		}
	});
</script>

@endsection