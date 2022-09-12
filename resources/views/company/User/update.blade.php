@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">User</h3>
		</div>
	</div>
	<div class="container-fluid">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Edit User</h4>
						<div class="table-responsive">
						@foreach($user as $companyuser)
							<form class="m-t-40"   method="POST" action="{{ route('companyuseredit') }}">
								@csrf                   
								<div class="form-group" style="display:none">
									<h5>Id <span class="text-danger">*</span></h5>
									<div class="controls"> 

										<input type="text" name="id" class="form-control" value="{{ old('id',$companyuser->id ?? '' )}}"> 
										<div class="help-block"></div>
									</div>
								</div> 
								<div class="form-group">
									<h5>User Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="name" class="form-control" value="{{ old('name',$companyuser->name ?? '' )}}"> 
										<div class="help-block"></div>
									</div>
								</div>
								
								<div class="form-group">
									<h5>User Password <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="password" class="form-control" value="{{ old('password',$companyuser->opensource ?? '' )}}"> 
										<div class="help-block"></div>
									</div>
								</div>
								<div class="text-xs-right">
									<button type="submit" class="btn btn-info">Submit</button>
								</div>
							</form>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
