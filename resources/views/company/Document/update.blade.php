@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Document</h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Add Document</h4>
						<div class="table-responsive">
						@foreach($document as $companydocument)
							<form class="m-t-40"   method="POST" action="{{ route('companydocumentedit') }}" enctype="multipart/form-data">
								@csrf
								<div class="form-group" style="display:none">
									<h5>Id <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="id" class="form-control" value="{{ old('id',$companydocument->id ?? '' )}} "> 
										<div class="help-block"></div>
									</div>
								</div> 
								<div class="form-group">
									<h5>Document Type <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="name" class="form-control"   value="{{ old('type',$companydocument->type ?? '' )}} "> 
										<div class="help-block"></div>
								  </div>
								</div>
								<div class="form-group">
									<h5>Document Short Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="shortname" class="form-control"    value="{{ old('shortname',$companydocument->shortname ?? '' )}} "> 
										<div class="help-block"></div>
									</div>
								</div>
								<div class="form-group">
									<h5>Document Template <span class="text-danger">*</span></h5>
									<div class="controls">
										 <input type="file" name="document_template" class="form-control" value="{{$companydocument->template}}" > 
										 <div class="help-block">{{$companydocument->template}}</div>
									</div>
								</div>
								<div class="form-group">
									<h5>Status <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="status" id="select" required="" class="form-control">
											@php if($companydocument->status==1){
											echo '<option value="1">Active</option>
											<option value="0">Inactive</option>'; 
											} 
											else{ 
											echo '<option value="0">Inactive</option>
											<option value="1">Active</option>'; 
											}@endphp
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
