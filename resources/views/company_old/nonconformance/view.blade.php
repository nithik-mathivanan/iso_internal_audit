@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">NC Report</h3>
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
						<h4 class="card-title">NC Report  </h4>
						<h6 class="card-subtitle"></h6>
						<div class="table-responsive">
							<table id="ncview-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
								
								<thead> 
									<tr>
										<th>Non Conformance</th>
										<th>NC Report</th>
										<th>Status</th>
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
		//var AuditPlanNo = {{request()->AuditPlanNo}};
		
		$('#ncview-grid').DataTable({
		processing: true,
		serverSide: true,
			ajax:{	 
			url:'../ncviewdetail/{{request()->AuditPlanNo}}',
			},
			columns: [
			
			{ data: 'nonconformance', name: 'nonconformance' },

			{ data: 'ncreport', name: 'ncreport' },
			{ data: 'status', name: 'status' },
			],
		responsive: !0,
		});
	});
</script>
@endsection 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>  
	 $(document).on('click', '.addAttr', function(){  
var NCRNO = $(this).attr("id");
$(".modal-body #NCRNO").val(NCRNO);
var major = $(this).attr("major");
$(".modal-body #major").val(major);
var minor = $(this).attr("minor");
$(".modal-body #minor").val(minor);
var CorrectionResponsible = $(this).attr("CorrectionResponsible");
$(".modal-body #CorrectionResponsible").val(CorrectionResponsible);
var CorrectionStatus = $(this).attr("CorrectionStatus");

if(CorrectionStatus=="1"){
CorrectionStatus="Waiting for CA";
}
else if(CorrectionStatus=="2") {
CorrectionStatus="Correction Action Planned";
}
else if(CorrectionStatus=="3") {
CorrectionStatus="Completed ";
}
$(".modal-body #CorrectionStatus").val(CorrectionStatus);
var plan_date = $(this).attr("plan_date");
$(".modal-body #plan_date").val(plan_date);
var plan_comments = $(this).attr("plan_comments");
$(".modal-body #plan_comments").val(plan_comments);
var plan_status= $(this).attr("plan_status");
if(plan_status=="1"){
plan_status="Waiting for Verification";
}
else if(plan_status=="2") {
plan_status="Action Accepted";
}
else if(plan_status=="3") {
plan_status="Not Accepted";
}
else if(plan_status=="4") {
plan_status="Comment Sent";
}
$(".modal-body #plan_status").val(plan_status);
var CorrectionTargetDate = $(this).attr("CorrectionTargetDate");
$(".modal-body #CorrectionTargetDate").val(CorrectionTargetDate);
var CorrectiveStatus = $(this).attr("CorrectiveStatus");
if(CorrectiveStatus=="1"){
CorrectiveStatus="Waiting for Correction";
}
else if(CorrectiveStatus=="2") {
CorrectiveStatus="Correction Action Planned";
}
else if(CorrectiveStatus=="3") {
CorrectiveStatus="Completed Planned";
} 
$(".modal-body #CorrectiveStatus").val(CorrectiveStatus);
var AuditPlanNo = $(this).attr("auditplanno");  $(".modal-body #AuditPlanNo").val(AuditPlanNo);
console.log(NCRNO);
});
function submit() { 
    $("form").submit(function(e) {
		$("#error").empty();
		$("#success").empty();
		e.preventDefault();
		$.ajax({
			type: 'POST',
			headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
			url: '{{route("correctionupdate")}}',
			data: $('form').serialize(),
			dataType: "json",
			success: function(data) { 
		if(data==='Y'){
		 location.reload();
			}
			console.log(data);
			},
			error: function(data) {
console.log(data);
			$("#error").append('<b>Check all the fields are filled</b>');
			console.log("Error");
			}
		});
		});
}

$(document).ready(function() {
    submit();
});
    </script>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header"><h4 class="card-title">NON-CONFORMANCE REPORT </h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form class="m-t-40" id="form" >
						
				<input name="NCRNO" value="" id="NCRNO" style="display:none">
				<input name="AuditPlanNo" value="" id="AuditPlanNo"  style="display:none">
				<input name="comment" value="" id="comment"  style="display:none">
						<!-- <div class="table-responsive">
							<table class="table color-table success-table" style="font-size:10px; ">
								<thead class="border">
									<tr>
										<th  colspan="8" class="reporttable9  " >NON CONFORMITY  – DESCRIPTION (with objective evidence)</th>
									</tr>
								</thead>
								<tbody>
								<tr class="border">

									<td   class="reporttable13"> 
									Grade
									</td>
									<td class="border1"> 

									<fieldset>
									  <label class="custom-control custom-checkbox">
									  <input type="checkbox" name="major" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Dont be greedy!" required="" class="custom-control-input" aria-invalid="false"><span class="custom-control-label"></span>Major</label>
									</fieldset>
									<fieldset>
									  <label class="custom-control custom-checkbox">
									  <input type="checkbox" name="minor" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Dont be greedy!" required="" class="custom-control-input" aria-invalid="false" ><span class="custom-control-label"></span>Minor</label>
									</fieldset>
									</td>

								</tr>
								</tbody>
							</table>
						</div> -->
						<!-- <div class="table-responsive">
							<table class="table color-table success-table" style="font-size:10px; ">
								<thead class="border">
								<tr  >
								<th   class="reporttable9 " >CORRECTION ( immediate solution )</th>
								</tr>
								</thead>
								<tbody >
								<tr class="border">
								<td class="border1">

								<div style="float:left;padding-left:50px;">Responsibility:                                    </div>
								<div style="float:left;padding-left:100px;">Target Date :                                                                   </div>
								<div  style="float:left;padding-left:100px;">Status:   <br>Waiting for Correction/<br> Correction Action planned /<br> Completed                                 </div>
								</td>
								</tr>
								</tbody>
							</table>
						</div> -->
						<!-- <div class="table-responsive">
							<table class="table color-table success-table" style="font-size:10px; ">
								<thead class="border">
								<tr  >
								<th  colspan="2" class="reporttable9 " >ROOT CAUSE ANALYSIS</th>
								</tr>
								</thead>
								<tbody >
									<tr class="border">
									<td style="padding:5px;">
									<fieldset>
									  <label class="custom-control custom-checkbox">
									  <input type="checkbox" name="root[]" value="analysis" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Dont be greedy!" required="" class="custom-control-input" aria-invalid="false"><span class="custom-control-label">5 Why Analysis  </span> </label>
									</fieldset>
									</td>
									</tr>
									<tr class="border">
									<td style="padding:5px;">
									<fieldset>
									  <label class="custom-control custom-checkbox">
									  <input type="checkbox" name="root[]" value="fish" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Dont be greedy!" required="" class="custom-control-input" aria-invalid="false"><span class="custom-control-label">Fish bone diagram </span> </label>
									</fieldset>
									</td>
									</tr>
								</tbody>
							</table>
						</div> -->
						<!-- <div class="table-responsive">
							<table class="table color-table success-table" style="font-size:10px; ">
								<thead class="border">
									<tr  >
										<th  class="reporttable9 " >CORRECTIVE ACTION (ATTACKED ROOT CAUSE)</th>
									</tr>
								</thead>
								<tbody>
									<tr class="border">
									<td class="border1">

									<div style="float:left;">Responsibility:  
									 <input type="date" name="CorrectionResponsible" readonly id="CorrectionResponsible">                        </div>
									<div style="float:left;">Target Date :  <input type="date" name="target_date" readonly id="CorrectionTargetDate">                                                                 </div>
									
									</td>
									</tr>
								</tbody>
							</table>
						</div> --> 
						<div class="table-responsive"><table class="table color-table success-table" style="font-size:10px; ">
								<thead class="border">
									<tr  >
										<th  colspan="8" class="reporttable9  " >NON CONFORMITY  – DESCRIPTION (with objective evidence)</th>
									</tr>
								</thead>
								<tbody>
								
								</tbody>
							</table>
						</div>
						<div class="table-responsive">
							<table class="table color-table success-table" style="font-size:10px; ">
								<thead class="border">
								<tr  >
								<th   class="reporttable9 " colspan="3">CORRECTION ( immediate solution )</th>
								</tr>
								</thead>
								<tbody>
								
									<tr class="border">
									<td class="">

									<div style="float:left;">Responsibility:  
										<input type="text" id="CorrectionResponsible" readonly="">
									                       </div></td>
									<td>
									<div style="float:left;">Target Date :  <input type="text" id="CorrectionTargetDate">                                                                 </div></td><td>
									<div  style="float:left;">Status:   
									<input type="text" id="CorrectionStatus" readonly="">  
									             </div>
									</td>
									</tr>
								</tbody>
							</table>
						</div>
						
						<div class="table-responsive">
							<table class="table color-table success-table" style="font-size:10px; ">
								<thead class="border">
									<tr >
										<th  class="reporttable9 " colspan="3">CORRECTIVE ACTION (ATTACKED ROOT CAUSE)</th>
									</tr>
								</thead>
								<tbody>
									<tr class="border">
									<td class="">

									<div style="float:left;">Responsibility:  
										<input type="text" id="CorrectiveResponsible" readonly="">
									                      </div></td>
									<td>
									<div style="float:left;">Target Date :  <input type="date" id="CorrectiveTargetDate">                                                                 </div></td><td>
									<div  style="float:left;">Status:   
									<input id="CorrectiveStatus" type="text">
									             </div>
									</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="table-responsive">
							
					
							<table class="table color-table success-table" style="font-size:10px; ">
								<thead class="border">
									<tr  >
									<th  colspan="8" class="reporttable9 " >VERIFICATION OF CORRECTION & CORRECTIVE ACTION (PLAN)</th>

									</tr>
								</thead>
								<tbody >
									<tr class="border">
									<!-- <td  class="reporttable13"> 
									Date 
									</td>
									<td class="reporttable16">  <input type="date" name="correction_date" id="plan_date" readonly> 
									</td>-->

									
									<td class="reporttable16">
										<div  style="float:left;">Comments:<a href="{{ asset('public/images/') }}"id="plan_comments"><input type="text"  id="plan_comments" readonly="" style="border:"></a>   
									 </div>
									</td>
								
									<td class="reporttable16"><div  style="float:left;">Date:  <input type="date" id="plan_date"  readonly> </div>
									</td>
									<td class="reporttable16"> <div  style="float:left;"> Status <input type="text" id="plan_status"  readonly> </div>
									</td>
								</tr>
								</tbody></table><table class="table color-table success-table" style="font-size:10px; ">
								<thead class="border">
									<tr  >
									<th  colspan="8" class="reporttable9 " >EFFECTIVENESS VERIFICATION</th>

									</tr>
								</thead>
								<tbody ><tr>
								
													<td class="reporttable16">
														<div  style="float:left;">Comments:
														<input type="text" name="verify_comments"></div>
													</td>

													<td class="reporttable16">
														<div  style="float:left;">Date:
														<input type="date" name="verify_date"></div>
													</td>
													<td><div  style="float:left;">Status<select name="CorrectionResponsible">
									  <option value="">Status</option>
									  <option value="1">Waiting for Effectiveness Verification</option>
									   <option value="2">Effectiveness of action Accepted & NCR Closed</option>
									   <option value="3">Not AcceptedClosed</option>
									</select>   </div>  </td>
									</tr>
								</tbody>

							</table>
					</div>
						
 <button type="submit" class="btn btn-info" id="checkBtn"  id="submitform">SUBMIT</button> 
						</form>
				
		</div>
	</div>
</div>   </div>
