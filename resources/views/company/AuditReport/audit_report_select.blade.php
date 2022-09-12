@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor"> Select Audit Plan for Audit Report</h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"> Audit Plan View List</h4>
						<h6 class="card-subtitle"></h6>
						<div class="table-responsive">
							<table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
								<thead>
									<tr>
										<th>No</th>
										<th>Audit Number</th>
										<th>Status</th>
										<th>Department</th>
										<th>Date</th>
										<th>Auditor</th>
										<th>View</th>
									</tr>
								</thead>
								<tbody>

									@foreach($program as $companyplan)
									@php 
													$auditor=$companyplan->auditor;
													 $user=Auth::user();
									
									if ($auditor==$user->id){ 
											@endphp
									
									
									<tr>
										<td>{{$sno++}}</td>
										<td>{{$companyplan->audit_number}}</td>
										<td>{{$companyplan->status}}</td>

										<td>@foreach($departmentview as $department1) 
											@if($department1->id == $companyplan->department) 
											{{$department1->name}}
											@endif 
										@endforeach 
										</td>
										<td>{{$companyplan->plan_date}}</td>
										
										<td>@foreach($user1 as $userview) 
											@if($userview->id == $companyplan->auditor) 
											{{$userview->name}}
											@endif 
										@endforeach </td>
										<td><a href="./audit_report_complete/{{ Auth::user()->company_id }}/{{$companyplan->audit_number}}/{{$companyplan->department}}/{{$companyplan->id}}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="View Audit Plan"><i class="ti-eye" aria-hidden="true"></i></a>
										</td>
										</td>
									</tr>
									@php
								}
									@endphp
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
