@extends('company.layouts.app')
@section('content')
	<div class="page-wrapper">

		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h3 class="text-themecolor">Activity</h3>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Add Activity</h4>
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
										<form class="m-t-40"   method="POST" action="{{ route('activitystore') }}">
											@csrf
											<div class="form-group">
												<h5>Activity Name <span class="text-danger">*</span></h5>
													<div class="controls">
														<input type="text" name="name" class="form-control" value="{{old('name') }}"> 
														<div class="help-block"></div>
													</div>
											</div>
											<div class="form-group">
											<h5>Status <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="status" id=""  class="form-control">
													<option value="">Status</option>
													<option value="1">Active</option>
													<option value="0">Inactive</option>
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
