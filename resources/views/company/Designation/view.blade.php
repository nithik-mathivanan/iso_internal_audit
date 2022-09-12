@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Designation</h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Designation List</h4>
						<a href="{{ route('companydesignation') }}" class="btn btn-info btn-rounded" style="float:right">Add New Designation</a>
						<h6 class="card-subtitle"></h6>
							<div class="table-responsive">
								<table id="designation-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
									<thead>
										<tr>
											<th>Name</th>
											<th>Department</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
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
<script type="text/javascript">
	$(function() {
		$('#designation-grid').DataTable({
		processing: true,
		serverSide: true,
			ajax:{
			url:"{{route('companydesignationdata')}}"
			},
			columns: [
			{ data: 'name', name: 'name' },
			{ data: 'department', name: 'department' },
			{ data: 'status', name: 'status' },
			{ data: 'action', name: 'action', orderable: false, searchable: false},
			],
		responsive: !0,
		});
	});
</script>
@endsection