@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">IMP View</h3>
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
						<h4 class="card-title">IMP</h4>
						<h6 class="card-subtitle"></h6>
						<div class="table-responsive">
							<table id="IMPview-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
								<thead>
									<tr>
										<th>Improvement</th>
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

		$('#IMPview-grid').DataTable({
		processing: true,
		serverSide: true,
			ajax:{
				url:'../IMPviewdetail/{{request()->AuditPlanNo}}',
			},
			columns: [
			
			{ data: 'improvement', name: 'improvement' },
			{ data: 'status', name: 'status' },
			],
		responsive: !0,
		});
	});
</script>
@endsection 


<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header"><h4 class="card-title">Improvement REPORT </h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form class="" id="form" >
						
				<input name="IMPNO" value="" id="IMPNO" style="display:none">
				<input name="AuditPlanNo" value="" id="AuditPlanNo"  style="display:none">
						
						<div class="table-responsive"><table class="table color-table success-table" style="font-size:10px; ">
								<thead class="border">
									<tr  >
										<th  colspan="8" class="reporttable9  " >DEPARTMENT /PROCESS Improvement (IMP) REPORT</th>
									</tr>
								</thead>
								<tbody>
								
								
								
									<tr class="border">
									<td class="">

									<div style="float:left;">Improvement Description:  
										<input type="text" id="" name="description">
									                       </div></td><br/>
									<td>
									<div style="float:left;">Proposed Action :  <input type="text" id="" name="propose">                                                                 </div></td><br/>
									</tr>
									
								
									<tr class="border"><td class="">

									<div style="float:left;">Responsibility:  
										<input type="text" id=""  name="response">
									                       </div></td><br/>
									<td>
									<div style="float:left;">Target :  <input type="text"  name="target">                                                                 </div></td><br/>
									<td><div  style="float:left;">Status<select name="status">
									  <option value="">Status</option>
									  <option value="1">Waiting for Action </option>
									   <option value="2">Action Planned </option>
									   <option value="3">Completed</option>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>  
	 $(document).on('click', '.addAttr', function(){  
           var IMPNO = $(this).attr("id");  $(".modal-body #IMPNO").val(IMPNO);
          
           var AuditPlanNo = $(this).attr("AuditPlanNo");  $(".modal-body #AuditPlanNo").val(AuditPlanNo);
			console.log(IMPNO);
});
function submit() { 
    $("form").submit(function(e) {
		$("#error").empty();
		$("#success").empty();
		e.preventDefault();
		$.ajax({
			type: 'POST',
			headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
			url: '{{route("IMPstore")}}',
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