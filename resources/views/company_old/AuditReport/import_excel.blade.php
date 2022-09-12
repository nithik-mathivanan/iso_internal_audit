@extends('company.layouts.app')
@section('content')
	<div class="page-wrapper">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h3 class="text-themecolor">Excel</h3>
			</div>
		</div>
		<div class="container-fluid">
			@if(count($errors) > 0)
				<div class="alert alert-danger">
				Upload Validation Error<br><br>
				<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
				</ul>
				</div>
			@endif
			<div class="card">
				<div class="card-body">
					<form method="post" enctype="multipart/form-data" action="{{ url('audit/import_excel/import') }}">
						@csrf
						<div class="form-group">
							<table class="table">
								<tr>
									<td width="40%" align="right"><label>Select File for Upload</label></td>
									<td width="30">
									<input type="file" name="select_file" />
									</td>
									<td width="30%" align="left">
									<input type="submit" name="upload" class="btn btn-primary" value="Upload">
									</td>
								</tr>
								<tr>
									<td width="40%" align="right"></td>
									<td width="30"><span class="text-muted">.xls, .xslx</span></td>
									<td width="30%" align="left"></td>
								</tr>
							</table>
						</div>
					</form>
					<br/>
					<div class="table-responsive">
						<table  id="import-grid"  class="table m-t-30 table-hover contact-list">
							<thead>
								<th>RelevantClause</th>
								<th>PS</th>
								<th>CheckPoint</th>
								<th>Conformance</th>
								<th>NonConformanceMajor</th>
								<th>NonConformanceMinor</th>
								<th>Observation</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
<script type="text/javascript">
	$(function() {
		$('#import-grid').DataTable({
			processing: true,
			serverSide: true,
			ajax:{
				url:"{{route('importdata')}}"
			},
			columns: [
				{ data: 'RelevantClause', name: 'RelevantClause' },
				{ data: 'PS', name: 'PS' },
				{ data: 'CheckPoint', name: 'CheckPoint' },
				{ data: 'Conformance', name: 'Conformance' },
				{ data: 'NonConformanceMajor', name: 'NonConformanceMajor' },
				{ data: 'NonConformanceMinor', name: 'NonConformanceMinor' },
				{ data: 'Observation', name: 'Observation' },
				{ data: 'status', name: 'status' },
			   
				{ data: 'action', name: 'action', orderable: false, searchable: false},
			],
			responsive: !0,
		});
	});
</script>

@endsection