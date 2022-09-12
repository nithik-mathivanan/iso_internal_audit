@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">User</h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Add User</h4>
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
								<form class="m-t-40"   method="POST" action="{{ route('userstore') }}">
									@csrf
									<div class="form-group">
										<h5>User Name <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="name" class="form-control" value="{{old('name') }}">	<div class="help-block"></div>
											</div>
									</div>
									<div class="form-group">
										<h5>User Email <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="email" name="email" class="form-control" value="{{old('email') }}">	<div class="help-block"></div>
											</div>
									</div>
									<div class="form-group">
										<h5>User Password <span class="text-danger">*</span></h5>
											<div class="controls">
												<input type="text" name="password" class="form-control" value="{{old('password') }}">	<div class="help-block"></div>
											</div>
									</div>
									<div class="form-group">
										<h5>Role <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="role" id="other"  class="form-control other">
												<option value="">Select Role</option>
												<option value="topmanagement">Topmanagement</option>
												<option value="staff">Staff</option>
													
											 </select>
											<div class="help-block"></div>
										 </div>		
										<div id="topmanagement" class="hide">
										  
										</div>	
								
										<div id="audit" class="hide">
									
										</div>	
										<div id="staff" class="hide">
											
										<div id="form-group" >
										<h5>Staff Designation <span class="text-danger">*</span></h5>
										  <select name="designation" class="form-control other">
												<option value="">Select Designation</option>
												@foreach($designation as $companydesignation)

<option value="{{$companydesignation->id}}">{{$companydesignation->name}} - 
	@foreach($department as $companydepartment) 
@php
 if($companydesignation->department==$companydepartment->id){

@endphp 
{{$companydepartment->name}}

@php } @endphp  @endforeach </option>

@endforeach
											
											 </select>
										</div>		<div class="form-group">
											<h5>Designation <span class="text-danger">*</span></h5>
											
											<fieldset>
												<label class="custom-control custom-checkbox">
													<input type="checkbox" name="auditor"  class="custom-control-input" aria-invalid="false" value="Y"><span class="custom-control-label">Auditor</span> 
												</label>
											</fieldset>
											<fieldset>
												<label class="custom-control custom-checkbox">
													<input type="checkbox" name="auditee"  class="custom-control-input" aria-invalid="false" value="Y"><span class="custom-control-label">Auditee</span>
												</label>
											</fieldset>
										</div> 
										
										</div>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$('#other').change(function () {
var select=$(this).find(':selected').val();        
 $(".hide").hide();
 $('#' + select).show();

	    }).change();
</script>
									</div>
									<div class="form-group">
											<div class="controls"  id="select1">
												
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
@endsection
