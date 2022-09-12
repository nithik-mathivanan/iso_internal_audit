@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
		<h3 class="text-themecolor">AUDIT PLAN</h3>
		</div>
	</div>
	<div class="container-fluid">
		<form action="{{ route('auditplan_update') }}" method="post">
			@csrf
			<div class="row">
			<div class="col-12">
			<div class="card">
			<div class="card-body">
				<div id="reportPrinting">
					<h4 class="card-title">AUDIT PLAN STAGE</h4>
					<div class="table-responsive">
						<table class="table color-table success-table" style="font-size:10px; ">
							<thead class="border">
								<tr>
									<th  colspan="4" class="audittable" >INTERNAL  AUDIT PLAN</th>
								</tr>
							</thead>
							<tbody>
								<span style="display:none">
									@foreach($department as $departmentarray)
									<input type="text" value="{{$departmentarray->name}}" name="checkdepartment[]">
									@endforeach
								</span>
								<tr class="border">
									<td  class="auditcolor"> 
										Audit Number
									</td>
									<td class="border1"> 
										@foreach($number as $audit_number)
										{{$audit_number->audit_number}}<input type="" name="audit_number" value="{{$audit_number->audit_number}}" style="display:none">
										@endforeach
									</td>
									<td  class="auditcolor"> 
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
										@foreach($program as $companystandard)
												@php
													$scope=$companystandard->scope;
													$scope1=explode(",",$scope); 

													$standard=$companystandard->standard;
													$standard1=explode(",",$standard); 
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
						<table class="table color-table success-table" style="font-size:10px; ">
							<tbody>
								<tr class="border">
								<td  class="auditcolor"> 
								Objective
								</td>
								<td class="border1"> 
								<textarea style="width:100%" name="objective">{{$companyplanview->objective}}</textarea>
								</td>
								</tr>
								<tr class="border">
									<td class="auditcolor"> 
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
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="table-responsive">
						<table class="table color-table success-table" style="font-size:10px; "  id="dynamic_field">
							<thead class="border">
								<tr>
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
							<tbody>
								@foreach($planview as $companyplanview)
									<span style="display:none">{{$sno++}}</span>
									<input type="text" name="status" value="{{$companyplanview->status}}"  style="display:none">
									<tr style="border:solid 1px #000;">
										<td class="border1">{{$sno}} </td>
										<td class="border1">
											<fieldset>
												<select name="activity[]">
													<option value="{{$companyplanview->activity}}">{{$companyplanview->activity}}</option>
													<option>Select Activity</option>
													<option>Audit</option>
													<option>Open Meeting</option>
													<option>Lunch Break</option>
													<option>Meeting</option>
												</select>
											</fieldset>
										</td>
										<td style="display:none"><input type="text" name="id[]" value="{{$companyplanview->id}}"></td>

										<td style="border:solid 1px #000;padding:5px;">
											<fieldset>
												<select name="department[]" class="departmentselect"   id="dep{{$sno}}">
													@php if($companyplanview->department=='0'){ @endphp
													<option value="0">Select Department</option>	@php } else{ @endphp 
													<option value="{{$companyplanview->department}}" >@foreach($department as $departmentarray)
													@if($departmentarray->id==$companyplanview->department) {{$departmentarray->name}}
													@endif
													@endforeach</option>
													<option value="0">Select Department</option>
													@php } @endphp
													@foreach($department as $companydepartment)
													<option value="{{$companydepartment->id}}">{{$companydepartment->name}}	</option>
													@endforeach
												</select>
											</fieldset>
										</td>
										<td class="border1">
											<input type="date" name="date1[]" value="{{$companyplanview->plan_date}}">
										</td>
										<td class="border1"><input type="time" name="start_time[]" value="{{$companyplanview->start_time}}"> </td>
										<td class="border1"><input type="time" name="end_time[]" value="{{$companyplanview->end_time}}"> </td>
										<td  class="border1"> 
											<select class="required dep{{$sno}}" name="auditor[]"  placeholder="Select Auditor" id="aud{{$sno}}" style=" width: auto;">
												@php if($companyplanview->auditor=='0'){ @endphp
												<option value="0" >Select Auditor</option>
												@php } 
												else{ @endphp
												
													<option value="{{$companyplanview->auditor}}" >@foreach($auditor as $auditorarray)
													@if($auditorarray->id==$companyplanview->auditor) {{$auditorarray->name}}
													@endif
													@endforeach</option>
													<option value="0">Select Auditor</option>
													@php } @endphp
													@foreach($auditor as $companyauditor)
													<option value="{{$companydepartment->id}}">{{$companyauditor->name}}	</option>
													@endforeach
												
												
											</select>
										</td>
										<td class="border1">
											@php 
											$str1=$companyplanview->auditee;
											$array2=explode(",",$str1); 
											@endphp
											@foreach ($array2 as $item) 
											@php if($item=='0'){ } else{@endphp
											<fieldset>
												<label class="custom-control custom-checkbox auditeedep{{$sno}}">

												<input type="checkbox" name="auditee[][]"   class="custom-control-input" aria-invalid="false" value="{{$item}}" checked>
												<span class="custom-control-label">@foreach($auditee as $auditeearray)
													@if($auditeearray->id==$companyplanview->auditee) {{$auditeearray->name}}
													@endif
													@endforeach</span></label>
											</fieldset>
											 @php }@endphp	 
											@endforeach
										</td>
										<td class="border1">
										<fieldset>
											<select name="document_ref[]">
												<option value="{{$companyplanview->document_ref}}">{{$companyplanview->document_ref}}</option>
												<option>Select Document</option>
												<option value="DocumentRef1">DocumentRef1</option>
												<option value="DocumentRef2">DocumentRef2</option>
											</select>
										</fieldset>
										</td>
										<td class="border1">
											<fieldset>
												<select name="relevant[]">
													<option value="{{$companyplanview->relevant_clause}}">{{$companyplanview->relevant_clause}}</option>
													<option>Select Relevant</option>
													<option value="relevant1">relevant1</option>
													<option value="relevant2">relevant2</option>
												</select>
											</fieldset>
										</td>
										<td class="border1">
											<input type="text" name="remarks[]" value="{{$companyplanview->remarks}}">
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			<br/>
			
		</form>
			<div class="col-sm-2">
				<form  action="{{ route('plancirculated') }}" method="post">
					@csrf
					@foreach($number as $audit_number)
						<input type="text" name="audit_number" value="{{$audit_number->audit_number}}"  style="display:none">  
					@endforeach
					<button type="submit" class="btn btn-info">CIRCULATE</button> 
				</form>
			</div>
			<br/>
			<div class="col-sm-2">
				<input id="printBtn" type="button" value="PRINT"  class="btn btn-info"  />
			</div>
		</div></div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
	<script lang='javascript'>
	$("#printBtn").click(function(){
	printcontent($("#reportPrinting").html());
	});

	function printcontent(content)
	{
	var mywindow = window.open('', '', '');
	mywindow.document.write('<html><title>Print</title><style>th{color:black !important;}</style><body>');
	mywindow.document.write('<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">');
	mywindow.document.write('<style>body{color:black;}.auditcolor{color:black !important;}</style>');
	mywindow.document.write('<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">');
	mywindow.document.write(' <link href="{{ asset('assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">');
	mywindow.document.write(content);
	mywindow.document.write('</body></html>');
	mywindow.document.close();
	mywindow.print();
	return true;
	}
	</script>     
</div>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script>
	$(document).ready(function (e) {
	$(document).on('change', '.departmentselect', function(){
	var select = $(this).attr("id");
	console.log(select);
	var id=$(this).attr('id');
	console.log(id);
	$('.'+select).empty();
	var department1=$('#'+select).val();
	console.log(department1);
	var op1=" ";
	$.ajax({
	type: "POST",
	headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
	data: {
	"department1": $('#'+select).val(),
	},
	url: '../../auditorsearch/'+department1,
	dataType: "json",
	success: function (data) {
	op1+='<option value="0" selected disabled>Choose Auditor</option>';
	console.log(data.length);
	for(var i=0;i<data.length;i++){
	op1+='<option value="'+data[i].name+'">'+data[i].name+'</option>';
	}
	$("."+select).append(op1);
	console.log(data);
	},
	error: function (data) {
	$('#msg').html('hai');
	},  
	});
	});
	});
	</script>
	<script>
	$(document).ready(function (e) {
	$(document).on('change', '.departmentselect', function(){
	var select2 = $(this).attr("id");
	console.log(select2);
	var id=$(this).attr('id');
	console.log(id);
	$(".auditee"+select2).empty();
	var department1=$('#'+select2).val();
	console.log(department1);
	var op2=" ";
	$.ajax({
	type: "POST",
	headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
	data: {
	"department1": $('#'+select2).val(),
	},
	url: '../../auditeesearch/'+department1,
	dataType: "json",
	success: function (data1) {
	console.log(data1.length);
	for(var i=0;i<data1.length;i++){
	op2='<input type="checkbox" name="auditee[][]"  class="custom-control-input" aria-invalid="false" value="'+data1[i].name+'" ><span class="custom-control-label">'+data1[i].name+'</span> ';
	}
	$(".auditee"+select2).append(op2);
	console.log(data1);
	},
	error: function (data1) {
	$('#msg').html('hai');
	},  
	});
	});
	});
	</script>
	<script type="text/javascript">
	$(document).ready(function () {
	$('#checkBtn').click(function() {
	checked = $("input[type=checkbox]:checked").length;
	if(!checked) {
	alert("You must check at least one checkbox.");
	return false;
	}
	});
	});
	</script>

	<footer class="footer">
	© 2021 ISO Supporter
	</footer>
@endsection