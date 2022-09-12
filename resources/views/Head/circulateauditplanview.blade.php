@extends('company.layouts.app')


@section('content')

   <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
               <div class="col-md-5 align-self-center">
                  <h3 class="text-themecolor">CIRCULATE AUDIT PLAN</h3>
               </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
               <!-- ============================================================== -->
               <!-- Start Page Content -->
               <!-- ============================================================== -->
         
<form action="{{ route('auditplan_update') }}" method="post">
{{ csrf_field() }}
      <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title">CIRCULATE AUDIT PLAN STAGE</h4>
                           <div class="table-responsive">
                              <table class="table color-table success-table" style="font-size:10px; ">
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
                                       <td class="border1"> 
                                         @foreach($number as $audit_number)
										 {{$audit_number->audit_number}}<input type="" name="audit_number" value="{{$audit_number->audit_number}}" style="display:none">
										@endforeach
                                       </td>
                                       <td   class="auditcolor"> 
                                          Standard References
                                       </td>
                                       <td class="border1">
@foreach($planview as $companyplanview)
<?php 
$str=$companyplanview->scope;
$array1=explode(",",$str); 


$str1=$companyplanview->standard;
$array2=explode(",",$str1); 

?>


@endforeach



<?php 
$str=$companydepartment2->scope;
$array1=explode(",",$str); 


$str1=$companydepartment2->standard;
$array2=explode(",",$str1); 

?>
@foreach($standard1 as $companystandard)
                                 <fieldset>
                                             <label class="custom-control custom-checkbox">
<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$companystandard->name}}" @foreach ($array2 as $item) 
<?php if ($item==$companystandard->name){echo "checked";}?>
@endforeach ><span class="custom-control-label">{{$companystandard->name}}</span> </label>
                                          </fieldset>

@endforeach
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="table-responsive">
                              <table class="table color-table success-table" style="font-size:10px; ">
                                 <tbody >
                                    <tr class="border">
                                       <td  class="auditcolor"> 
                                          Objective
                                       </td>
                                       <td class="border1"> 
                                       <textarea style="width:100%" name="objective">{{$companyplanview->objective}}</textarea>
                                       </td>
                                    </tr>
                                    <tr class="border">
                                       <td  class="auditcolor"> 
                                          Scope 
                                       </td>
                                       <td class="border1">
@foreach ($scope1 as $scope1) 
<fieldset>
                                             <label class="custom-control custom-checkbox">
<input type="checkbox" name="scope[]"  class="custom-control-input" aria-invalid="false" value="{{$scope1}}" @foreach ($array1 as $item1) 
<?php if ($item1==$scope1){echo "checked";}?>
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

									<option value="{{$companyplanview->department}}">{{$companyplanview->department}}</option>
									<option>Select Department</option>
								@foreach($department as $companydepartment)
									<option value="{{$companydepartment->name}}">{{$companydepartment->name}}	</option>
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
 <select class="required dep{{$sno}}" name="auditor[]"  placeholder="Select Auditor" id="aud{{$sno}}"  style=" width: auto;">
            	@foreach($auditor as $companyauditor)
	<option value="{{$companydepartment->name}}" <?php if($companyauditor->name==$companyplanview->auditor) echo "selected" ?>>{{$companyplanview->auditor}}	</option>
 @endforeach
   </select>

										
										
										</td>
                                       <td class="border1">
<?php 

$str1=$companyplanview->auditee;
$array2=explode(",",$str1); 

?>

<fieldset>
            <label class="custom-control custom-checkbox auditeedep{{$sno}}">
 @foreach ($array2 as $item) 
							<input type="checkbox" name="auditee[][]"   class="custom-control-input" aria-invalid="false" value="{{$item}}" checked>
<span class="custom-control-label">{{$item}}</span> </label>
                                          </fieldset>	 
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
                                       <td class="border1"><input type="text" name="remarks[]" value="{{$companyplanview->remarks}}"> </td>
                               

            @endforeach                   </tbody>
                            </table>
                           </div>

</form>
  </div>
                  </div>
               </div>
          
             

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

                             



 <!-- ============================================================== -->
               <!-- End Right sidebar -->
               <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
               © 2021 ISO Supporter
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
         </div>
         
  
@endsection