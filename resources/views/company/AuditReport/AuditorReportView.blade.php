@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
	<div class="col-md-5 align-self-center">
	<h3 class="text-themecolor">CIRCULATE AUDIT PLAN</h3>
	</div>
	</div>
<div class="container">
	@if($message = Session::get('success'))
		<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{ $message }}</strong>
		</div>
	@endif
<div class="container-fluid">
<form action="{{ route('AuditReportStore') }}" method="post">
@csrf
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
	<h4 class="card-title">Audit complete and Report complete: 
	</h4>@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@foreach($report as $reportview)
			@php 
				$str=$reportview->scope;
				$array1=explode(",",$str);
				$str1=$reportview->standard;
				$array2=explode(",",$str1); 
				$str2=$reportview->auditor;
				$array3=explode(",",$str2); 
				$str3=$reportview->auditee;
				$array4=explode(",",$str3);
			@endphp
	<div class="table-responsive">
		
			<table class="table color-table success-table" style="font-size:10px; ">
				<thead class="border">
					<tr>
					<th  colspan="4" class="reporttable2" >
					
				INTERNAL AUDIT REPORT</th>
					</tr>
				</thead>
				<tbody>
					<tr class="border">
						<td  class="reporttable"> 
						Department/Process/Location
						</td>
						<td class="reporttable1"> 
				
						{{$reportview->department}}

						</td>
						<td   class="reporttable"> 
						Audit No.
						</td>
						<td class="reporttable1"> 
						{{$reportview->audit_number}}
						</td>
					</tr>
					<tr class="border">
						<td  class="reporttable"> 
						Auditor Name
						</td>
						<td class="reporttable1"> 
							<div class="form-group ">
								@foreach($report as $reportview)
									<fieldset>
										<label class="custom-control custom-checkbox">
											<input type="checkbox" name="auditor"  class="custom-control-input" aria-invalid="false" value="{{$reportview->auditor}}" @foreach ($array3 as $item) 
											@php if ($item==$reportview->auditor){echo "checked";

										}@endphp
											@endforeach ><span class="custom-control-label">
											@foreach($user as $userview) 
											@if($userview->id == $reportview->auditor) {{$userview->name}}
											 @endif 
											@endforeach 
											 </span>
										</label>
									</fieldset>
								@endforeach
							</div>
						</td>
						<td   class="reporttable"> 
						Auditee Name
						</td>
						<td class="reporttable1"> 
							<div class="form-group ">
								@foreach($report as $reportview)
									<fieldset>
									<label class="custom-control custom-checkbox">
										<input type="checkbox" name="auditee[]"  class="custom-control-input" aria-invalid="false" value="{{$companyauditee->auditee}}" @foreach ($array4 as $item) 
										@php if ($item==$companyauditee->auditee){echo "checked";}@endphp
										@endforeach >
										<span class="custom-control-label">
											@foreach($user as $userview) 
											@if($userview->id == $reportview->auditee) {{$userview->name}}
											 @endif 
											@endforeach 
											</span>
									</label>
									</fieldset>
								@endforeach
							</div>
						</td>
					</tr>
					<tr class="border">
						<td  class="reporttable"> 
						Document Reference
						</td>
						<td class="reporttable1"> 
						{{$reportview->document_ref}}
						</td>
						<td   class="reporttable"> 
						Date
						</td>
						<td class="reporttable1"> 
					<input type="text" name="AuditPlanNo" value="{{$reportview->id}}" style="display:none;">	
					<input type="text" name="department" value="{{$reportview->department}}" style="display:none;">	
					<input type="text" name="AuditNumber" value="{{$reportview->audit_number}}" style="display:none;">
					<input type="text" name="plan_date" value="{{$reportview->plan_date}}"  style="display:none;">	{{$reportview->plan_date}}
						</td>
					</tr>
					<tr class="border">
						<td  class="reporttable"> 
						Standard Reference
						</td>
						<td style=" padding:5px;">
							<div class="form-group ">
							@foreach($report as $reportview)
								<fieldset>
									<label class="custom-control custom-checkbox">
									<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$companystandard->standard}}" @foreach ($array2 as $item) 
									@php if ($item==$reportview->standard){echo "checked";}@endphp
									@endforeach ><span class="custom-control-label">{{$reportview->standard}}</span></label>
								</fieldset>
							@endforeach
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		@endforeach
	</div>
	<div class="table-responsive">
		<table class="table color-table success-table" style="font-size:10px; ">
			<thead class="border">
				<tr>
				<th class="reporttable2">Audit Summary Brief:-</th>
				</tr>
			</thead>
			<tbody>
				<tr class="border">
					<td style="padding:5px;">
						<fieldset>
							<label class="custom-control custom-checkbox">
								<input type="checkbox" name="summary1" id="summary1" class="custom-control-input" aria-invalid="false" checked><span class="custom-control-label">Overall the established relevant documented information including procedure & records related to department/process“{{$reportview->department}}” have been verified during this audit in line with determined international standard requirements, the samples which were chosen during this audit were met the requirements. There is no findings.</span> 
							</label>
						</fieldset>
					</td>
				</tr>
				<tr class="border">
					<td style="padding:5px;">
						<fieldset>
							<label class="custom-control custom-checkbox">
								<input type="checkbox" name="summary2"  id="summary2"   class="custom-control-input" checked><span class="custom-control-label">Overall the established relevant documented information including procedure & records related to department/process“{{$reportview->department}}”  have been verified during this audit in line with determined international standard requirements, the samples which were chosen during this audit were met the requirements, however the Observation (OBS) &/improvement point(s) identified. (Total  __ OBS &/ __ IMP). </span> 
							</label>
						</fieldset>
					</td>
				</tr>
				<tr class="border">
					<td style="padding:5px;">
						<fieldset>
							<label class="custom-control custom-checkbox">
								<input type="checkbox" name="summary3"  id="summary3"  class="custom-control-input"  checked><span class="custom-control-label">Overall the established relevant documented information including procedure & records related to department/process“{{$reportview->department}}”  have been verified during this audit in line with determined international standard requirements, the samples which were chosen during this audit were met the requirements except the requirements where the NCR(s) raised. {Total __ NCR (__Major NCR &/___ Minor NCR)}. </span> 
							</label>
						</fieldset>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="table-responsive">
		<table class="table color-table success-table" style="font-size:10px; ">
			<thead class="border">
			<tr>
			<th  colspan="2"  class="reporttable2" >Conformance evidences / (OPTIONAL- Audit Checklist evidence)</th>
			</tr>
			</thead>
			<tbody >
				<tr>
					<td>
						<br/><div class="form-group"><input type="text" id="Conformance" name="conformance[]" placeholder="Conformance" class="form-control name_list"  />	</div>
					</td>
					<td><br/>
						<button type="button" name="add" id="add" class="btn btn-info">+</button></td>
				
				</tr>
			
			<tbody class=""  id="dynamic_field" style="border:none !important">
			
			</tbody>
			<tr class="border" >
			<td class="reporttable4;">
			<fieldset>
			<label class="custom-control custom-checkbox">
			<input type="checkbox" name="styled_max_checkbox" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!"  class="custom-control-input" aria-invalid="false"><span class="custom-control-label">AUDIT CHECKLIST </span> 
			</label>
			</fieldset>
			</td>
			</tr>
			</tbody>
		</table>
	</div>
<div class="table-responsive">
<table class="table color-table success-table" style="font-size:10px; ">
<thead class="border">
<tr  >
<th   class="reporttable3 " >Non-Conformance Description (NCR) - If Any</th>
<th   class="reporttable2" >Status</th>
</tr>
</thead>
<tbody >
<tr class="border">
<td>
						<br/><div class="form-group"><input type="text" name="nonconformance[]" placeholder="Non Conformance" class="form-control name_list"   style="width:95%;"/><button type="button" name="add" id="add1" class="btn btn-info">+</button>	</div>
					
						</td>
<td style="padding:5px;"> 
</td>

</tr>
<tbody class=""  id="dynamic_field1" style="border:none !important">
</tbody>

</tbody>
</table>
</div>
<div class="table-responsive">
<table class="table color-table success-table" style="font-size:10px; ">
<thead class="border">
<tr  >
<th   style="padding:5px; border-right:solid 1px #000; text-align:center;  width:80%;   " >Observation (OBS) – If any</th>
<th   style="padding:5px; border-right:solid 1px #000; text-align:center;  " >Status</th>
</tr>
</thead>
<tbody >
<tr class="border">
<td>
						<br/><div class="form-group"><input type="text" name="observation[]" placeholder="Observation" class="form-control name_list"   style="width:95%;"/><button type="button" name="add" id="add2" class="btn btn-info">+</button>	</div>
					
						</td>
<td style="padding:5px;"> 
</td>

</tr>
<tbody class=""  id="dynamic_field2" style="border:none !important">
</tbody>

</tbody>
</table>
</div>
<div class="table-responsive">
<table class="table color-table success-table" style="font-size:10px; ">
<thead class="border">
<tr >
<th   style="padding:5px; border-right:solid 1px #000; text-align:center;  width:80%;  " >Improvement (IMP) – If Any</th>
<th   style="padding:5px; border-right:solid 1px #000; text-align:center;  " >Status</th>
</tr>
</thead>
<tbody>
<tr class="border">
<td>
						<br/><div class="form-group"><input type="text" name="improvement[]" placeholder="Improvement" class="form-control name_list"   style="width:95%;"/><button type="button" name="add" id="add3" class="btn btn-info">+</button>	</div>
					
						</td>
<td style="padding:5px;"> 
</td>

</tr>
<tbody class=""  id="dynamic_field3" style="border:none !important">
</tbody>
</tbody>
</table>
<input class="btn btn-info" type="submit" value="Audit Report Completed">
</div>
</div>
</div>
</div>
</div>
</form>
</div>
<footer class="footer">
© 2021 ISO Supporter
</footer>
</div>
@endsection
