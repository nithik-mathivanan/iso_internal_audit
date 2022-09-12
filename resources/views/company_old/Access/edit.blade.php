@extends('company.layouts.app')
@section('content')
	<div class="page-wrapper">

		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h3 class="text-themecolor">Assign Prepared / Reviewed / Approved Person</h3>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"></h4>
								<div class="table-responsive">
									@if ($errors->any())
										<div class="alert alert-danger">
											<ul>
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif
										<form class="m-t-40" onsubmit="return validation()"   method="POST" action="{{url('document/update-access')}}">
											@csrf
										<div class="form-group">
											<h5>Department Name <span class="text-danger">*</span></h5>
												<div class="controls">
													<input type="hidden" name="access_id" value="{{$access->id}}">
													<input type="hidden" name="department" value="{{$access->dept}}">
													<input type="text" class="form-control" value="{{$access->department->name}}" readonly>
													<div class="help-block"></div>
												</div>
										</div>
										<div class="form-group">
											<h5>Prepared Person Name <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="prepared" id="prepared"  class="form-control">
														@foreach($designation as $data)
															@if($data->id == $access->preparator)
															<option value="{{$data->id}}" selected>{{$data->name}}</option>
															@else
															<option value="{{$data->id}}">{{$data->name}}</option>
															@endif
														@endforeach
													</select>
												</div>
										</div>
										<div class="form-group">
											<h5>Reviewed Person Name<span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="review" id="review"  class="form-control">
													@foreach($designation as $data)
															@if($data->id == $access->reviewer)
															<option value="{{$data->id}}" selected>{{$data->name}}</option>
															@else
															<option value="{{$data->id}}">{{$data->name}}</option>
															@endif
														@endforeach
													</select>
													<div class="help-block"></div>
												</div>
										</div>
										<div class="form-group">
											<h5>Approved Person Name <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="approve" id="approve"  class="form-control">													
														@foreach($designation as $data)
															@if($data->id == $access->approver)
															<option value="{{$data->id}}" selected>{{$data->name}}</option>
															@else
															<option value="{{$data->id}}">{{$data->name}}</option>
															@endif
														@endforeach
													</select>
													<div class="help-block"></div>
												</div>
										</div>
										<div class="text-xs-right">
											<input type="submit" value="UPDATE" class="btn btn-info">
										</div>
										</form>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
<script type="text/javascript">
	function validation(){
		if($('#approve').val()==$('#prepared').val()){
			alert('Approve and Prepared person not to be same!!');
			return false;
		}
		else{
			return true;
		}
	}

	function getDesignation(){
			$('#prepared').empty();
			$('#review').empty();
			$('#approve').empty();
			var department = $('#department').val();
			if(department!=0){
				$.ajax({
	               type:'GET',
	               url:'{{url("document/get_designation_by_department")}}/'+department,
	               	success:function(data) {
		               	jQuery.each( data, function( i, val ) {
						  $('#prepared').append('<option value="'+val['id']+'">'+val['name']+'</option>')
						});
						jQuery.each( data, function( i, val ) {
						  $('#review').append('<option value="'+val['id']+'">'+val['name']+'</option>')
						});
						jQuery.each( data, function( i, val ) {
						  $('#approve').append('<option value="'+val['id']+'">'+val['name']+'</option>')
						});
	               	}
	            });
			}
	}
</script>
