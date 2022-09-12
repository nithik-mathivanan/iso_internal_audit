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
			 <div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">NON-CONFORMANCE REPORT</h4>
									<div class="table-responsive">

										<form class="m-t-40"   method="POST" action="{{ route('correctionstore') }}" id="form">
											@csrf
										<table class="table color-table success-table" style="font-size:10px; ">
											<thead class="border">
												<tr  >
													<th  colspan="8"  class="reporttable2"  >NON-CONFORMANCE REPORT</th>
												</tr>
											</thead> 
											@foreach($auditplan as $auditplanview)
											@foreach($ncr as $ncrview)
											@foreach($report as $reportview)
											<tbody >
												<tr class="border">
													<td   class="reporttable"> 
														Audit Number
													</td>
													<td class="reporttable1"> 
													 {{$auditplanview->audit_number}}
													</td>
													<td    class="reporttable"> 
														NCR No.
													</td>
													<td class="reporttable1"> 
													<input type="text" name="NCRNO" value="{{$ncrview->id}}" style="display:none">  {{$ncrview->NCRNO}}
													</td>
													<td   class="reporttable"> 
														Department /Process/ Location
													</td>
													<td class="reporttable1"> 
													 {{$auditplanview->department}}
													</td>
													<td   class="reporttable"> 
														Audit Date
													</td>
													<td class="reporttable1"> 
													 {{$reportview->plan_date}}
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="table-responsive">
										<table class="table color-table success-table" style="font-size:10px; ">
											<tbody >
												
													<input type="text" value="{{$reportview->AuditPlanNo}}" name="AuditPlanNo" style="display:none">
												<tr class="border">
													<td  class="reporttable12"> 
														Standard Reference    
													</td>
													<td class="border1"> 
													 {{$auditplanview->standard}}
													</td>
												</tr>
												<tr class="border1">
													<td  class="reporttable12"> 
														Document Reference    
													</td>
													<td class="border1"> 
													 {{$auditplanview->document_ref}}
													</td>
												</tr>
												<tr class="border">
													<td  class="reporttable12"> 
														Relevant Clause  
													</td>
													<td class="border1">
														<fieldset>
															<label class="custom-control custom-checkbox">
															<input type="checkbox" name="styled_max_checkbox" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required="" class="custom-control-input" aria-invalid="false"><span class="custom-control-label"></span>
													 {{$auditplanview->relevant_clause}} </label>
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
													<th  colspan="8" class="reporttable9  " >NON CONFORMITY  – DESCRIPTION (with objective evidence)</th>
												</tr>
											</thead>
											<tbody >
												<tr class="border">
													<td  class="reporttable13"> 
														File
													</td>
													<td class="border1">
														<!-- <div class="form-group">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
																<span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="hidden">
																<input type="hidden"><input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div> -->
														
													</td>
													<td   class="reporttable13"> 
														Grade
													</td>
													<td class="border1"> 
														
														<fieldset>
															<label class="custom-control custom-checkbox">
															<input type="checkbox" name="major" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required="" class="custom-control-input" aria-invalid="false"><span class="custom-control-label"></span>Major</label>
														</fieldset>
														<fieldset>
															<label class="custom-control custom-checkbox">
															<input type="checkbox" name="minor" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required="" class="custom-control-input" aria-invalid="false" ><span class="custom-control-label"></span>Minor</label>
														</fieldset>
													</td>
													<td  class="reporttable13"> 
														Auditor
													</td>
													<td class="reporttable14">
 
													@foreach($user as $userview) 
														@if($userview->id == $auditplanview->auditor) 
													<input type="text" name="auditor" value="{{$userview->id}}" style="display:none">	
														 @endif 
													@endforeach 
													</td>
													<td   class="reporttable13"> 
														Auditee
													</td>
													<td  class="reporttable14"> 
													<input type="text" name="auditee" value="{{Auth::user()->id}}" style="display:none"> 
														
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="table-responsive">
										<table class="table color-table success-table" style="font-size:10px; ">
											<thead class="border">
												<tr  >
													<th   class="reporttable9 " >CORRECTION ( immediate solution )</th>
												</tr>
											</thead>
											<tbody >
												<tr class="border">
													<td class="border1">
														<!-- <div class="form-group">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
																<span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="hidden">
																<input type="hidden"><input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div> -->
														<div style="float:left;padding-left:50px;">Responsibility:                                    </div>
														<div style="float:left;padding-left:100px;">Target Date :                                                                   </div>
														<div  style="float:left;padding-left:100px;">Status:   <br>Waiting for Correction/<br> Correction Action planned /<br> Completed                                 </div>
													</td>
												</tr>
											
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
															<input type="checkbox" name="root[]" value="analysis" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required="" class="custom-control-input" aria-invalid="false"><span class="custom-control-label">5 Why Analysis  </span> </label>
														</fieldset>
													</td>
												</tr>
												<tr class="border">
													<td style="padding:5px;">
														<fieldset>
															<label class="custom-control custom-checkbox">
															<input type="checkbox" name="root[]" value="fish" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required="" class="custom-control-input" aria-invalid="false"><span class="custom-control-label">Fish bone diagram </span> </label>
														</fieldset>
													</td>
												</tr>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="table-responsive">
										<table class="table color-table success-table" style="font-size:10px; ">
											<thead class="border">
												<tr  >
													<th  class="reporttable9 " >CORRECTIVE ACTION (ATTACKED ROOT CAUSE)</th>
												</tr>
											</thead>
											<tbody >
												<tr class="border">
													<td class="border1">
														<!-- <div class="form-group">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
																<span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="hidden">
																<input type="hidden"><input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div> -->
														<div style="float:left;padding-left:50px;">Responsibility:  
														 <select name="Responsibility">
															<option value="">Select Responsible Person</option>
															<option value="auditor">Auditor</option>
														</select>                        </div>
														<div style="float:left;padding-left:100px;">Target Date :  <input type="date" name="target_date">                                                                 </div>
														<div  style="float:left;padding-left:100px;">Status:   <br>Waiting for Correction/<br> Correction Action planned /<br> Completed                                                                                                                                                                                                                                </div>
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
													<th  colspan="8" class="reporttable9 " >EFFECTIVENESS VERIFICATION</th>
												</tr>
											</thead>
											<tbody >
												<tr class="border">
													<td  class="reporttable13"> 
														Date 
													</td>
													<td class="reporttable16">  <input type="date" name="correction_date"> 
													</td>
													<td   class="reporttable13"> 
														ISO Co-ordinator (MR)
														/Auditor
													</td>
													<td class="border1">
														<!-- <div class="form-group">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
																<span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="hidden">
																<input type="hidden"><input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div> -->
													</td>
													<td  class="reporttable13"> 
														Comments
													</td>
													<td class="reporttable16">
														
													<input type="text" name="correction_comment"> 
													</td>
													<td   class="reporttable13"> 
														Audit Date
													</td>
													<td class="reporttable16"> 
														Waiting for Verification/ Action accepted /<br> Not Accepted/<br> Comment sent	
													</td>
													<td  class="reporttable13"> 
														Date 
													</td>
													
													</td>
													<td   class="reporttable13"> 
														ISO Co-ordinator (MR)
														/Auditor
													</td>
													<!-- <td class="border1">
														<div class="form-group">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
																<span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="hidden">
																<input type="hidden"><input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
													</td> -->
													<td  style="reporttable17"> 
														Comments
													</td>
													<td class="reporttable16"> 
													</td>
													<td   class="reporttable13"> 
														Audit Date
													</td>
													<td class="reporttable16"> 
														Waiting for Verification/ Action accepted /<br> Not Accepted/<br> Comment sent	
													</td>
												</tr>
											</tbody>
											@endforeach
											@endforeach
											@endforeach
											
										</table><input type="submit" class="btn btn-info"></form>
									</div>
								</div>
							</div>
						</div>
					</div>
					
		</div>
	</div>
</div>
@endsection
