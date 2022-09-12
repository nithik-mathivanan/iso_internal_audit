@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Auditor User</h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Staff User List</h4>
						<a href="{{ route('companydepartmentuser') }}" class="btn btn-info btn-rounded" style="float:right">Add New Staff User </a>
						<h6 class="card-subtitle"></h6>
							<div class="table-responsive"><div class="table-responsive">
							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
								
							</div>
								<table id="departmentuser-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
									<thead>
										<tr>
										
											<th>Name</th>
											<th>Email</th>
											<th>Department</th>
											<th>Designation</th>
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
		$('#departmentuser-grid').DataTable({
		processing: true,
		serverSide: true,
			ajax:{
			url:"{{route('companydepartmentuserdata')}}"
			},
			columns: [
			{ data: 'name', name: 'name' },
			{ data: 'email', name: 'email' },
			{ data: 'department', name: 'department' },
			{ data: 'designation', name: 'designation' },
			{ data: 'action', name: 'action', orderable: false, searchable: false},
			],
		responsive: !0,
		});
	});
</script>
@endsection