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
							<table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
								<thead>
									<tr>
										<th>No</th>
										<th>Audit Number</th>
										<th>Audit Frequency</th>
										<th>status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($program as $companyprogram)
									<tr>
										<td>{{$sno++}}</td>
										<td>{{$companyprogram->audit_number}}</td>
										<td>{{$companyprogram->audit_frequency}}</td>
										<td>{{$companyprogram->status}}</td>
										<td><a href="./audit_plan/{{ Auth::user()->company_id }}/{{$companyprogram->audit_number}}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="View  Audit Program"><i class="ti-eye" aria-hidden="true"></i></a>
										</td>
										</td>
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
