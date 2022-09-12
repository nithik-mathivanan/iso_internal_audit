<html>
 <style>
		@font-face {
		  font-family: 'Helvetica';
		  font-weight: normal;
		  font-style: normal;
		  font-variant: normal;
		  src: url('<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">');
		} 
	h1, h2, h3, h4, h5, h6 {
	 color: #455a64;
	 font-family: "Poppins", sans-serif;
	 font-weight: 400;
	}
		body {
		 font-family: "Poppins", sans-serif;
		}
		.custom-checkbox .custom-control-input:checked~.custom-control-label::after {
	 background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26l2.974 2.99L8 2.193z'/%3e%3c/svg%3e);
	}.custom-radio .custom-control-label::before {
	 border-radius: 50%;
}.custom-control-input:checked~.custom-control-label::before {
	 color: #fff;
	 border-color: #007bff;
	 background-color: #007bff;
}
	.custom-control-label::after {
		 position: absolute;
		 top: 0.25rem;
		 left: -1.5rem;
		 display: block;
		 width: 1rem;
		 height: 1rem;
		 content: "";
		 background: no-repeat 50%/50% 50%;
	}
	.card-title {
	 margin-bottom: 0.75rem;
	 font-family: "Poppins", sans-serif;
	}
	h4 {
	 line-height: 22px;
	 font-size: 18px;
	 font-family: "Poppins", sans-serif;
	}
	.card-subtitle {
	 margin-bottom: 15px;
	 color: #99abb4;
	 font-family: "Poppins", sans-serif;
	}
	.custom-control-input:checked~.custom-control-label::before {
	 color: #fff;
	 border-color: #007bff;
	 background-color: #007bff;
	}
	.border {
	}
	.audit_num {
	 padding: 10px !important;
	 text-align: center;
	 font-size: 14px;
	}
	.color-table.success-table thead th {
	 background-color: #1976d2;
	 color: #ffffff;
}

.audittable1 {
	 padding: 5px !important;
	 text-align: center !important;
}
.auditcolor {
	 padding: 5px !important;
	 text-align: center !important;
	 color: rgb(255, 255, 255) !important;
	 background-color: rgb(25, 118, 210) !important;
}
.audittable2 {
	 padding: 5px!important;
}
td{
	border: 1px solid black;
}
fieldset{
	border: :none;
}
.border1{
	padding: 5px;
}
</style>
<body>

			<div class="page-wrapper">
			 <div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor">AUDIT PLAN</h3>
					</div>
				</div>
				 <div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">AUDIT PLAN STAGE</h4>
									<div class="table-responsive">
										<table class="table color-table success-table" style="font-size:10px; width: 100%;">
											<thead class="border">
												<tr  >
													<th  colspan="4" class="audittable" >INTERNAL  AUDIT PLAN</th>
												</tr>
											</thead>
											<tbody >
												<tr class="border">
													<td  class="auditcolor"> 
														Audit Number
													</td>
													<td class="border1" > 
													  @foreach($number as $audit_number)
														{{$audit_number->audit_number}}<input type="" name="audit_number" value="{{$audit_number->audit_number}}" style="display:none">
														@endforeach
													</td>
													<td   class="auditcolor"> 
														Standard References
													</td>
													<td class="border1">
														@foreach($planview as $companyplanview)
														@php 
															$str=$companyplanview->scope;
															$array1=explode(",",$str); 
															$str1=$companyplanview->standard;
															$array2=explode(",",$str1); 
														@endphp
													@endforeach
													  @foreach ($array2 as $standard1) 
														<fieldset>
															<label class="custom-control custom-checkbox">
															<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$standard1}}" @foreach ($array2 as $item2) 
															@php if ($item2==$standard1){echo "checked";}@endphp
															@endforeach ><span class="custom-control-label">{{$standard1}}</span> </label>
														</fieldset>
													@endforeach
													 
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="table-responsive">
										<table class="table color-table success-table" style="font-size:10px;width: 100%;">
											<tbody >
												<tr class="border">
													<td  class="auditcolor"> 
														Objective
													</td>
													<td class="border1"  > 
													{{$companyplanview->objective}}
													</td>
												</tr>
												<tr class="border">
													<td  class="auditcolor"> 
														Scope 
													</td>
													<td class="border1">
														@foreach ($array1 as $scope1) 
															<fieldset>
																<label class="custom-control custom-checkbox">
																<input type="checkbox" name="scope[]"  class="custom-control-input" aria-invalid="false" value="{{$scope1}}" @foreach ($array1 as $item1) 
																@php if ($item1==$scope1){echo "checked";}@endphp
																@endforeach ><span class="custom-control-label">{{$scope1}}</span> </label>
															</fieldset>
														@endforeach
												</tr>
											</tbody>
										</table>
									</div>
									<div class="table-responsive">
										<table class="table color-table success-table" style="font-size:10px;width: 100%; ">
											<thead class="border">
												<tr  >
													<th  class="audittable1" >Sl. No.</th>
													<th class="audittable2">Activity</th>
													<th class="audittable2">Department / Process /Location </th>
													<th class="audittable2">Date</th>
													<th class="audittable2">Start Time</th>
													<th class="audittable2">End Time</th>
													<th class="audittable2">Auditor </th>
													<th class="audittable2">Auditee</th>
													<th class="audittable2">Document Reference</th>
													<th class="audittable2">Relevant Clauses  </th>
													<th class="audittable2">REMARKS</th>
												</tr>
											</thead>
											<tbody >
													@foreach($planview as $companyplanview)
												<tr >
													<td class="border1">1 </td>
													<td class="border1">
													  {{$companyplanview->activity}}
													</td>
													<td style=>
													 @foreach($department as $departmentarray)
													@if($departmentarray->id==$companyplanview->department) {{$departmentarray->name}}
													@endif
													@endforeach
													</td>
													<td class="border1">{{$companyplanview->plan_date}}
													</td>
													<td class="border1">{{$companyplanview->start_time}} </td>
													<td class="border1"> {{$companyplanview->end_time}}</td>
													<td  class="border1">
														@foreach($auditor as $auditorarray)
															@if($auditorarray->id==$companyplanview->auditor) 
																{{$auditorarray->name}}
															@endif
														@endforeach
													</td>
													<td class="border1">
													@foreach($auditee as $auditeearray)
														@if($auditeearray->id==$companyplanview->auditee) 
															{{$auditeearray->name}}
														@endif
													@endforeach</td>
													<td class="border1"> {{$companyplanview->document_ref}}</td>
													<td class="border1">{{$companyplanview->relevant_clause}} </td>
													<td class="border1">{{$companyplanview->remarks}}</td>
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
		  
</body>
</html>