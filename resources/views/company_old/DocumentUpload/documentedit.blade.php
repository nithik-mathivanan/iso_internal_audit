@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Edit Document </h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Update Document</h4>
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
							<form class="m-t-40"   method="POST" action="{{ route('documentupdate') }}" enctype="multipart/form-data">
								@csrf
								@foreach($documentupload as $documentupload)
								
								<input type="hidden" name="id"  value="{{$documentupload->id}}" > 
								<input type="hidden" name="department"  value="{{$documentupload->designation}}" > 
								<input type="hidden" name="type"  value="{{$documentupload->document_type}}" > 
								<input type="hidden" name="status"  value="{{$documentupload->document_status}}" > 
								
								
								@endforeach
								<input type="hidden" name="user_id"  value="{{Auth::user()->id}}" > 
								<div class="form-group">
									<h5>Document Upload <span class="text-danger">*</span></h5>
									<div class="controls">
										 <input type="file" name="document" class="form-control" value="{{old('document') }}" > 
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
