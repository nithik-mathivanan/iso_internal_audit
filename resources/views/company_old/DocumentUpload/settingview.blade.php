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
						<h4 class="card-title">Add Document Header Footer Setting</h4>
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
							<form class="m-t-40"   method="POST" action="{{ route('settingstore') }}" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="user_id"  value="{{Auth::user()->id}}" > 
								
								
								<div class="form-group">
									<h5>Logo <span class="text-danger">*</span></h5>
									<div class="controls">
										  <select name="logo" id="select"  class="form-control">
											<option value="">Select Type</option>
											<option value="left">Left</option>
											<option value="center">Center</option>
											<option value="right">Right</option>
											</select>
										
										<div class="help-block"></div>
									</div>
								</div>
								
								<div class="form-group">
									<h5>Company Name <span class="text-danger">*</span></h5>
									<div class="controls">
										  <select name="company_name" id="select"  class="form-control">
											<option value="">Select Type</option>
											<option value="left">Left</option>
											<option value="center">Center</option>
											<option value="right">Right</option>
											</select>
										
										<div class="help-block"></div>
									</div>
								</div>
								
								<div class="form-group">
									<h5>Document Name,Document No, Approval Date <span class="text-danger">*</span></h5>
									<div class="controls">
										  <select name="document_name" id="select"  class="form-control">
											<option value="">Select Type</option>
											<option value="left">Left</option>
											<option value="center">Center</option>
											<option value="right">Right</option>
											</select>
										
										<div class="help-block"></div>
									</div>
								</div>
								<div class="form-group">
									<h5>Prepared By Alignment <span class="text-danger">*</span></h5>
									<div class="controls">
										  <select name="prepared" id="select"  class="form-control">
											<option value="">Select Type</option>
											<option value="left">Left</option>
											<option value="center">Center</option>
											<option value="right">Right</option>
											</select>
										
										<div class="help-block"></div>
									</div>
								</div>
								
								
									<div class="form-group">
									<h5>Reviewed By Alignment <span class="text-danger">*</span></h5>
									<div class="controls">
										  <select name="reviewed" id="select"  class="form-control">
											<option value="">Select Type</option>
											<option value="left">Left</option>
											<option value="center">Center</option>
											<option value="right">Right</option>
											</select>
										
										<div class="help-block"></div>
									</div>
								</div>
								
									<div class="form-group">
									<h5>Approved By Alignment <span class="text-danger">*</span></h5>
									<div class="controls">
										  <select name="approved" id="select"  class="form-control">
											<option value="">Select Type</option>
											<option value="left">Left</option>
											<option value="center">Center</option>
											<option value="right">Right</option>
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

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Document Header Footer Setting</h4>
					
						<h6 class="card-subtitle"></h6>
						<div class="table-responsive">
							<table id="document-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
								<thead>
									<tr>
										<th> Id</th>
										<th>Logo</th>
										<th>Company Name</th>
										<th>Document Name,Document No,Approval Date</th>
										<th>Prepared By Alignment</th>
										<th>Reviewed By Alignment</th>
										<th>Aproved By Alignment</th>
										<th>View</th>
										<th>Delete</th>
										</tr>
								</thead>
								<tbody>
								@foreach($mr_setting as $mr_setting1)
									<tr>
									
									<td>{{$mr_setting1->companyid}} </td>
									<td>{{$mr_setting1->logo}} </td>
									<td>{{$mr_setting1->company_name}} </td>
									<td>{{$mr_setting1->document_name}} </td>
									<td>{{$mr_setting1->prepared}} </td>
									<td>{{$mr_setting1->reviewed}} </td>
									<td>{{$mr_setting1->approved}} </td>
									
									<td><a  href="" class="btn btn-sm btn-info">View</a></td> </td>
									<td><a href="./settingdestroy/{{$mr_setting1->id}}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure, You want to delete this?');"><i class="ti-close" aria-hidden="true"></i></a></td>
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
@section('script')

@endsection