@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Select Audit Program</h3>
			@if(Session::has('success'))
			<script type="text/javascript">alert(" {!! session('success') !!}");</script>
			@endif
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Select Audit Program</h4>
						<h6 class="card-subtitle"></h6>
						<div class="table-responsive">
							<table id="nc-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
								<thead>
									<tr>
										<th>Audit Plan No</th>
										<th>Audit Date</th>
										<th>Non Conformance</th>
										<th>OBS</th>
										<th>IMP</th>
										<th>status</th>
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
		$('#nc-grid').DataTable({
		processing: true,
		serverSide: true,
			ajax:{
			url:"{{route('auditeencdata')}}"
			},
			columns: [
			
			{ data: 'AuditPlanNo', name: 'AuditPlanNo' },
			{ data: 'plan_date', name: 'plan_date' },
			{ data: 'nonconformance', name: 'nonconformance' },
			{ data: 'OBS', name: 'OBS' },
			{ data: 'IMP', name: 'IMP' },
			{ data: 'status', name: 'status' },
			{ data: 'action', name: 'action', orderable: false, searchable: false},
			],
		responsive: !0,
		});
	});
</script>
@endsection 