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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Select Audit Program </h4>
						<h6 class="card-subtitle"></h6>
						<div class="table-responsive">
							<table id="ncview-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
								<thead>
									<tr>       
										<th>Non Conformance</th>
										<th>Ncreport</th>
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

		$('#ncview-grid').DataTable({
		processing: true,
		serverSide: true,
			ajax:{
			url:'../auditeencviewdetail/{{request()->AuditPlanNo}}',
			},
			columns: [
			
			{ data: 'nonconformance', name: 'nonconformance' },
			{ data: 'ncreport', name: 'ncreport' , orderable: false, searchable: false},
			{ data: 'status', name: 'status', orderable: false, searchable: false },
			],
		responsive: !0,
		});
	});
</script>
@endsection    
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header"><h4 class="card-title">NON-CONFORMANCE REPORT</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form class="m-t-40" id="form" enctype="multipart/form-data">
				<input name="NCRNO" value="" id="NCR" style="display:none">
				<input name="AuditPlanNo" value="" id="AuditPlanNo"  style="display:none">
						<div class="table-responsive">
							<table class="table color-table success-table" style="font-size:10px; ">
								<thead class="border">
									<tr  >
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
									  <input type="checkbox" name="major"  class="custom-control-input" aria-invalid="false"><span class="custom-control-label"></span>Major</label>
									</fieldset>
									<fieldset>
									  <label class="custom-control custom-checkbox">
									  <input type="checkbox" name="minor"  class="custom-control-input" aria-invalid="false" ><span class="custom-control-label"></span>Minor</label>
									</fieldset>
									</td><td   class="reporttable13"> 
									Description Doc
									</td>
<td><input type="file" name="desc_document"></td>
								</tr>
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
								<tbody >
								
									<tr class="border">
									<td class="">

									<div style="float:left;">Responsibility:  
									<select name="CorrectionResponsible">
									  <option value="">Select Responsible Person</option>
									  <option value="auditor">Auditor</option>
									</select>                        </div></td>
									<td>
									<div style="float:left;">Target Date :  <input type="date" name="CorrectionTargetDate">                                                                 </div></td><td>
									<div  style="float:left;">Status:   
									<select name="CorrectionStatus">
									 <option value="">Select Status</option>
									 <option value="1">Waiting for CA</option>
									 <option value="2">Corrective Action planned</option>
									 <option value="3">Completed</option>
									</select>   
									             </div>
									</td>
									</tr>
										<tr><td><input type="file" name="correction_document"></td></tr>
								</tbody>
							</table>
						</div>
						<div class="table-responsive">
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
									  <input type="checkbox" name="root[]" value="analysis"  class="custom-control-input" aria-invalid="false"><span class="custom-control-label">5 Why Analysis  </span> </label>
									</fieldset>
									</td>
									</tr>
									<tr class="border">
									<td style="padding:5px;">
									<fieldset>
									  <label class="custom-control custom-checkbox">
									  <input type="checkbox" name="root[]" value="fish"  class="custom-control-input" aria-invalid="false"><span class="custom-control-label">Fish bone diagram </span> </label>
									</fieldset>
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
									<select name="CorrectiveResponsible">
									  <option value="">Select Responsible Person</option>
									  <option value="auditor">Auditor</option>
									</select>                        </div></td>
									<td>
									<div style="float:left;">Target Date :  <input type="date" name="CorrectiveTargetDate">                                                                 </div></td><td>
									<div  style="float:left;">Status:   
									<select name="CorrectiveStatus">
									 <option value="">Select Status</option>
									 <option value="1">Waiting for Correction</option>
									 <option value="2">Correction Action planned</option>
									 <option value="3">Completed planned</option>
									</select>   
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
									<td  class="reporttable13"> 
									Date 
									</td>
									<td class="reporttable16">  <input type="date" name="correction_date"> 
									</td>


									<td  class="reporttable13"> 
									Comments
									</td>
									<td class="reporttable16">

									<input type="file" name="correction_comment"> 
									</td>
									<td  class="reporttable13"> 
									Status
									</td>
									<td>
									<select name="plan_status">
									 <option value="">Select Status</option>
									 <option value="1">Waiting for Verification</option>
									 <option value="2">Action Accepted</option>
									 <option value="3">Not Accepted</option>
									 <option value="3">Comment Sents</option>
									</select>  </td>
									</tr>
								</tbody>

							</table>
					</div>
						
 <button type="submit" class="btn btn-info" id="checkBtn"  id="submitform">SUBMIT</button> 
						</form>
				
		</div>
	</div>
</div>   </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>  
	 $(document).on('click', '.addAttr', function(){  
           var NCRNO = $(this).attr("id");  $(".modal-body #NCR").val(NCRNO);
           var AuditPlanNo = $(this).attr("AuditPlanNo");  $(".modal-body #AuditPlanNo").val(AuditPlanNo);
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
			url: '{{route("correctionstore")}}',
			data: new FormData(this),
			processData: false,
			contentType: false,
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