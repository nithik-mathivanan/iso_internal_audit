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
						<h4 class="card-title">User List </h4>
						<a href="{{ route('companyuser') }}" class="btn btn-info btn-rounded" style="float:right">Add New User</a>

						<h6 class="card-subtitle"></h6>
							<div class="table-responsive">
								<table id="user-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
									<thead>
										<tr>
											<th>Designation</th>
											<th>Department</th>
											<th>Name</th>
											<th>Email</th>
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
		$('#user-grid').DataTable({
		processing: true,
		serverSide: true,
			ajax:{
			url:"{{route('companyuserdata')}}"
			},
			columns: [
			{ data: 'status', name: 'status' },
			{data: 'department1', name: 'department1'},
			{ data: 'name', name: 'name' },
			{ data: 'email', name: 'email' },
			{ data: 'action', name: 'action', orderable: false, searchable: false},
			],
		responsive: !0,
		});
	});
</script> 
@endsection