@extends('company.layouts.app')


@section('content')

   <div class="page-wrapper">
         
            <div class="row page-titles">
               <div class="col-md-5 align-self-center">
                  <h3 class="text-themecolor">AUDIT PLAN</h3>
               </div>
            </div>
          
            <div class="container-fluid">
          
  
<form >
{{ csrf_field() }}
      <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title">AUDIT PLAN STAGE</h4>
                           <div class="table-responsive">
                              <table class="table color-table success-table" style="font-size:10px; ">
                                 <thead class="border">
                                    <tr  >
                                       <th  colspan="4" class="audittable" >INTERNAL  AUDIT PLAN</th>
                                    </tr>
                                 </thead>
                                 <tbody >
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
                                         @foreach($program as $companyprogram)
										 {{$companyprogram->audit_number}}<input type="" name="audit_number" value="{{$companyprogram->audit_number}}" style="display:none">
										@endforeach
                                       </td>
                                       <td   class="auditcolor"> 
                                          Standard References
                                       </td>
                                       <td class="border1">
										@foreach($program as $companyprogram)

										<?php 
										$str=$companyprogram->scope;
										$array1=explode(",",$str); 


										$str1=$companyprogram->standard;
										$array2=explode(",",$str1); 

										?>

										@endforeach

										@foreach($array2 as $standard)

										<fieldset>
													<label class="custom-control custom-checkbox">
										<input type="checkbox" name="standard[]"  class="custom-control-input standard" aria-invalid="false" value="{{$standard}}" ><span class="custom-control-label">{{$standard}}</span> </label>
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
                                       <textarea style="width:100%" name="objective">To check the effectiveness on implementation of Management System which has been established by the organization in line with international standard (s)</textarea>
                                       </td>
                                    </tr>
                                    <tr class="border">
                                       <td  class="auditcolor"> 
                                          Scope 
                                       </td>
                                       <td class="border1">

											@foreach($array1 as $scope)

										<fieldset>
													<label class="custom-control custom-checkbox">
										<input type="checkbox" name="scope[]"  class="custom-control-input scope" aria-invalid="false" value="{{$scope}}" ><span class="custom-control-label">{{$scope}}</span> </label>
																				  </fieldset>


										@endforeach
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>

							<span id="error" style="color:red"></span>
							<span id="success" style="color:green"></span>
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
                                                 
 <input id='add-row' class='btn btn-info' type='button' value='Add' />
<br/>
<br/>
@foreach($department as $companydepartment)
<span style="display:none">{{$sno++}} </span>
<tr style="border:solid 1px #000;">
                                       <td class="border1">{{$sno}} </td>
                                       <td class="border1">
                                          <fieldset>
                                           <select name="activity[]" class="activity"  id="activity{{$sno}}">
									<option>Select Activity</option>
									<option value="Audit">Audit</option>
									<option value="Meeting">Meeting</option>
									<option value="Break">Break</option>
											</select>
                                          </fieldset>
                                       </td>
                                       <td style="border:solid 1px #000;padding:5px;">
   <fieldset> <select class="  departmentselect activity{{$sno}}"  name="department[]" value="" 
                            id="dep{{$sno}}">
   
                            <option value="0"  selected>Select
                                Department</option>
                            @foreach($department as $companydepartment)
                            <option  value="{{ $companydepartment->id }}">
                               {{ $companydepartment->name }}</option>
                            @endforeach
                        </select>   </td>
                                      
 <td class="border1">
										<input type="date" name="date1[]">
                                       </td>
                                       <td class="border1"><input type="time" name="start_time[]"> </td>
                                       <td class="border1"><input type="time" name="end_time[]"> </td>
                                       <td  class="border1"> 
 <fieldset>
                                          
 <select class=" dep{{$sno}} 2activity{{$sno}} activity{{$sno}}" name="auditor[]"  placeholder="Select Auditor" id="aud{{$sno}} "  style=" width: auto;">
<option value="0"  selected>Select Auditor</option>
                </select>
                                          </fieldset>
										
										
										</td>


                        <td class="border1">

									
<fieldset><label class="custom-control custom-checkbox auditeedep{{$sno}}" id="1activity{{$sno}}"></label>
                         </fieldset>




</td>
                                       <td class="border1">
										 <fieldset>
                                           <select name="document_ref[]">
									<option>Select Document</option>
								
									<option value="DocumentRef1">DocumentRef1</option>
									<option value="DocumentRef2">DocumentRef2</option>
								
											</select>
                                          </fieldset>
										</td>
                                       <td class="border1">
										 <fieldset>
                                           <select name="relevant[]">
									<option>Select Relevant</option>
								
									<option value="relevant1">relevant1</option>
									<option value="relevant2">relevant2</option>
								
											</select>
                                          </fieldset>
									 </td>
                                       <td class="border1"><input type="text" name="remarks[]"> </td>
                 </tr>
 
                      @endforeach          </tbody>
                            </table>
                           </div>
<br/>
 <button type="submit" class="btn btn-info" id="checkBtn"  id="submitform">SUBMIT</button> 
<br/>
<br/>
                           <h6 class="card-title" >AUDIT PLAN PREPARED &CIRCULATED BY : ISO Co-ordinator/MR</h6>
                           <h6 class="card-title" >CIRCULATED ON:</h6>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
			

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

           
         <span style="display:none"> {{$sno++}}           </span>

<script>
var row={{$sno}}; 

  $(document).on("click", "#add-row", function () {

  var new_row = '<tr id="row'+row+'" style="border:solid 1px #000;"> <td class="border1">'+row+'</td> <td class="border1"><fieldset><select name="activity[]"  class="activity"  id="activity'+row+'"><option >Select Activity</option><option value="Audit">Audit</option><option value="Meeting">Meeting</option><option value="Break">Break</option></select></fieldset></td>          <td style="border:solid 1px #000;padding:5px;">   <fieldset> <select class="departmentselect activity'+row+'"  name="department[]" value=""      id="dep'+row+'">                               <option value="0"  selected>Select    Department </option>                            @foreach($department as $companydepartment)                            <option  value="{{ $companydepartment->id }}">                               {{ $companydepartment->name }}</option>                            @endforeach                        </select>   </td>                                       <td class="border1">										<input type="date" name="date1[]">                                       </td>                                       <td class="border1"><input type="time" name="start_time[]"> </td>                                       <td class="border1"><input type="time" name="end_time[]"> </td>                                       <td  class="border1">  <fieldset>                                           <select class=" dep'+row+'  2activity'+row+' activity'+row+' " name="auditor[]"  placeholder="Select Auditor" id="aud'+row+'"  >                </select>   </fieldset>																														</td><td class="border1"><fieldset><label class="custom-control custom-checkbox auditeedep'+row+'"  id="1activity'+row+'" ></label>     </fieldset></td><td class="border1"><fieldset><select name="document_ref[]"><option>Select Document</option><option value="DocumentRef1">DocumentRef1</option><option value="DocumentRef2">DocumentRef2</option></select></fieldset></td><td class="border1"><fieldset><select name="relevant[]"><option>Select Relevant</option><option value="relevant1">relevant1</option><option value="relevant2">relevant2</option></select></fieldset></td><td class="border1"><input type="text" name="remarks[]"> </td><td  class="border1"><input class="delete-row btn btn-info" type="button" value="Delete" /></td></tr>';
  
     $('#dynamic_field').append(new_row);

  row++;
  return false;

  });
   
  $(document).on("click", ".delete-row", function () {
    alert("Do you want to Delete this Row?");
    if(row>1) {
      $(this).closest('tr').remove();
      row--;
    }
  return false;
  });

</script>


 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>






<script>

 $(document).ready(function (e) {
  
$(document).on('change', '.departmentselect', function(){
  var select = $(this).attr("id");
//console.log(select);
  
$('.'+select).empty();
       var department1=$('#'+select).val();

//console.log(department1);
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
//console.log(data.length);
					for(var i=0;i<data.length;i++){
					op1+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
				   }

 $("."+select).append(op1);
   console.log(data);

        },
  error: function (data) {
              $('#msg').html('error');
        },  

    });
    
});
});
</script>
<script>
	 $(document).ready(function (e) { 
	$(document).on('change', '.activity', function(){
	 var selectid = $(this).attr("id");
	 var activity = $('#'+selectid).val();
	if(activity=='Audit'){
		$('.'+selectid).prop('required', true);
	}
	else{
		 $('#1'+selectid).empty();
		 $('.2'+selectid).empty();
		var auditor="";
		auditor='<option value="0">Choose Auditor</option>';
		$('.2'+selectid).append(auditor);
		var auditee="";
		auditee='<input type="text" name="auditee[][]" value="0" style="display:none" required><br/>';
		$('#1'+selectid).append(auditee);
	//console.log(selectid,activity,auditee);
	
	}
	//console.log(selectid,activity);
	});
	});
</script>


<script>

 $(document).ready(function (e) {
  $("#error").empty();
$(document).on('change', '.departmentselect', function(){
  var select2 = $(this).attr("id");
//console.log(select2);
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

//console.log(data1.length);
					for(var i=0;i<data1.length;i++){
 op2+='<input type="checkbox" name="auditee[][]"  class="custom-control-input" aria-invalid="false" value="'+data1[i].id+'" ><span class="custom-control-label">'+data1[i].name+'</span><br/>';
				
				   }

 $(".auditee"+select2).append(op2);
   //console.log(data1);

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
      scope = $(".scope:checkbox:checked").length;
      standard = $(".standard:checkbox:checked").length;

      if(!scope) {
        alert("You must check at least one checkbox in scope");
        return false;
      }
      if(!standard) {
        alert("You must check at least one checkbox in standard");
        return false;
      }

    });
});

</script>


<script>
function submit() {
    $("form").submit(function(e) {
		$("#error").empty();
		$("#success").empty();
		e.preventDefault();
		$.ajax({
			type: 'POST',
			headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
			url: '{{route("auditplan_store")}}',
			data: $('form').serialize(),
			dataType: "json",
			success: function(data) {
			if(data==='Y'){
			window.location.href = "../../program_select";
			}
			console.log(data);
			},
			error: function(data) {

			$("#error").append('<b>Check all the fields are filled or Check all the departments are selected</b>');
			console.log("Error");
			}
		});
		});
}

$(document).ready(function() {
    submit();
});
    </script>
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