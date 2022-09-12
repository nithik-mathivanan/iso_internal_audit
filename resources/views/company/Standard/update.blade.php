@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Standard</h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Add Standard</h4>
						<div class="table-responsive">
							@foreach($standard as $companystandard)
								<form class="m-t-40"   method="POST" action="{{ route('companystandardedit') }}">
									@csrf
									<div class="form-group" style="display:none">
										<h5>Id <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="id" class="form-control" value="{{ old('id',$companystandard->id ?? '' )}}"> 
											<div class="help-block"></div>
										</div>
									</div> 
									<div class="form-group">
										<h5>Standard Name <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name" class="form-control" value="{{ old('name',$companystandard->name ?? '' )}}"> 
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<h5>Status <span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="status" id="select" required="" class="form-control">
												@php if($companystandard->status==1){
												echo '<option value="1">Active</option>
												<option value="0">Inactive</option>'; 
												} 
												else{ 
												echo '<option value="0">Inactive</option>
												<option value="1">Active</option>'; 
												} 
												@endphp
											</select>
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
