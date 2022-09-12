@extends('company.layouts.app')
	@section('content')
		<div class="page-wrapper">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h3 class="text-themecolor"> Audit Plan View</h3>
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
													<th>Audit Frequency</th>
													<th>status</th>
													<th>Plan Status</th>
													<th>View</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											@foreach($plan as $companyplan)
												<tr>
													<td>{{$sno++}}</td>
													<td>{{$companyplan->audit_number}}</td>
													<td>{{$companyplan->status}}</td>
													@if($companyplan->circulate==0)
													<td><span>Audit Plan</span></td>
													<td><a href="./planview/{{ Auth::user()->company_id }}/{{$companyplan->audit_number}}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="View and Edits Audit Plan"><i class="ti-eye" aria-hidden="true"></i></a>
													</td>
													<td><a href="./plandelete/{{ Auth::user()->company_id }}/{{$companyplan->audit_number}}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete  Audit Plan"  onclick="return confirm('Are you sure, You want to delete this?');"><i class="ti-trash" aria-hidden="true"></i></a>
													</td>
													@endif

													@if($companyplan->circulate==1)
													
													<td><span>Plan Circulated </span></td>
													<td><a href="./circulateauditplanview/{{ Auth::user()->company_id }}/{{$companyplan->audit_number}}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="View and Edits Audit Plan"><i class="ti-eye" aria-hidden="true"></i></a>
													</td>	
													@endif
													
													
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
