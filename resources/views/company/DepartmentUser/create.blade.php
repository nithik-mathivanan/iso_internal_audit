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
								<form class="m-t-40"   method="POST" action="{{ route('companydepartmentuseredit') }}">
									@csrf
								
									<div class="form-group">
										<h5>Department <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="department" id="other"  class="form-control other">
												<option value="">Select Department</option>
												@foreach($department as $companydepartment)
												<option value="{{$companydepartment->name}}">{{$companydepartment->name}}</option>
												@endforeach
											
											</select>
											<div class="help-block"></div>
										 </div>
									</div>
									<div class="form-group">
										<h5>Staff  <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="id" id="other"  class="form-control other">
												<option value="">Select Staff</option>
												@foreach($staffuser as $companystaff)
												<option value="{{$companystaff->id}}">{{$companystaff->name}}</option>
												@endforeach
											
											</select>
											<div class="help-block"></div>
										 </div>
									</div>
								
									<div class="form-group">
										<h5>Designation  <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="designation" id="designation"  class="form-control other">
												<option value="">Select Staff</option>
												@foreach($designation as $companydesignation)
												<option value="{{$companydesignation->name}}">{{$companydesignation->name}}</option>
												@endforeach
											
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
@endsection
