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
										<form class="m-t-40" onsubmit="return validation()"  method="POST" action="{{ route('store-access') }}">
											@csrf
										<div class="form-group">
											<h5>Department Name <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="department" id="department"  class="form-control" onchange="getDesignation()">
													<option value="0">Select Department</option>
													@foreach($department as  $value)
													<option value="{{$value->id}}">{{$value->name}}</option>
													@endforeach
													</select>
													<div class="help-block"></div>
												</div>
										</div>
										<div class="form-group">
											<h5>Prepared Person Name <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="prepared" id="prepared"  class="form-control">
														
													</select>
												</div>
										</div>
										<div class="form-group">
											<h5>Reviewed Person Name<span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="review" id="review"  class="form-control">
														
													</select>
													<div class="help-block"></div>
												</div>
										</div>
										<div class="form-group">
											<h5>Approved Person Name <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="approve" id="approve"  class="form-control">
														
													</select>
													<div class="help-block"></div>
												</div>
										</div>
										<div class="text-xs-right">
											<input type="submit" value="submit" class="btn btn-info">
										</div>
										</form>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Prepared/Reviewed/Approved</h4>
						<h6 class="card-subtitle"></h6>
							<div class="table-responsive">
								<table id="activity-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
									<thead>
										<tr>
											<th>S.NO</th>
											<th>Department</th>
											<th>Prepared</th>
											<th>Reviewed</th>
											<th>Approved</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($access as $values)
										<tr>
											<td><?php echo $i;$i++; ?></td>
											<td>{{$values->department->name}}</td>
											<td>{{$values->prepare->name}}</td>
											<td>{{$values->review->name}}</td>
											<td>{{$values->approve->name}}</td>
											<td><a href="{{url('document/edit-access')}}/{{$values->id}}" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
											</td>
											<td><a href="{{url('document/delete-access')}}/{{$values->id}}"  data-id="' . $user->id . '"  class="sa-params delete" onclick=" return deleted()"><i class="fa fa-times" aria-hidden="true"></i>Delete</a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
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

	function deleted(){
		  let text = "Warning!!\n\nThis will affect the documents which involved in this department.";
		  if(confirm(text) == true) {
		    return true;
		  }
		  else {
		     return false;
		  }
	}
</script>
