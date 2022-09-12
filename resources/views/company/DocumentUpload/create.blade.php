@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Upload Document </h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Add Document</h4>
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
							<form class="m-t-40"   method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="user_id"  value="{{Auth::user()->id}}" > 
								<input type="hidden" name="department"  value="{{Auth::user()->department}}" > 
								
								<div class="form-group">
									<h5>Document Name <span class="text-danger">*</span></h5>
									<div class="controls">
									
										<input type="text" name="document_name" class="form-control" value="{{old('document_name') }}" > 
										<div class="help-block"></div>
									</div>
								</div>
								<div class="form-group">
									<h5>Document Type <span class="text-danger">*</span></h5>
									<div class="controls">
										  <select name="type" id="select"  class="form-control">
											<option value="">Select Type</option>
											@foreach($document as $companydocument)
											<option value="{{$companydocument->id}}">{{$companydocument->type}}</option>
											@endforeach
										</select>
										
										<div class="help-block"></div>
									</div>
								</div>
								<div class="form-group">
									<h5>Document Upload <span class="text-danger">*</span></h5>
									<div class="controls">
										 <input type="file" name="document" class="form-control" value="{{old('document') }}" > 
										 <div class="help-block"></div>
									</div>
								</div>
								<div class="form-group">
									<h5>Status <span class="text-danger">*</span></h5>
									<div class="controls">
									   <select name="status" id="select"  class="form-control">
											<option value="">Status</option>
											<option value="1">Active</option>
											<option value="0">Inactive</option>
										</select>
										<div class="help-block"></div>
									</div>
								</div>
								<div class="text-xs-right">
									<button type="submit" class="btn btn-info">Submit</button>
								</div>
							</form>
							<script>
							$('form input').blur(function() {
							if(!$.trim(this.value).length) { 
							$(this).parents('p').addClass('warning');
							}
							});
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
