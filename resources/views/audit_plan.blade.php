@extends('company.layouts.app')


@section('content')

   <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
               <div class="col-md-5 align-self-center">
                  <h3 class="text-themecolor">AUDIT PLAN</h3>
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
         
<form action="{{ route('auditplan_store') }}" method="post">
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
<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$standard}}" ><span class="custom-control-label">{{$standard}}</span> </label>
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

	@foreach($array1 as $standard)

<fieldset>
            <label class="custom-control custom-checkbox">
<input type="checkbox" name="scope[]"  class="custom-control-input" aria-invalid="false" value="{{$standard}}" ><span class="custom-control-label">{{$standard}}</span> </label>
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
                                                 
 <input id='add-row' class='btn btn-info' type='button' value='Add' />
<br/>
<br/>
@foreach($department as $companydepartment)
<span style="display:none">{{$sno++}} </span>
<tr style="border:solid 1px #000;">
                                       <td class="border1">{{$sno}} </td>
                                       <td class="border1">
                                          <fieldset>
                                           <select name="activity[{{$sno}}]">
									<option>Select Activity</option>
									<option>Audit</option>
									<option>Open Meeting</option>
									<option>Lunch Break</option>
									<option>Meeting</option>
											</select>
                                          </fieldset>
                                       </td>
                                       <td style="border:solid 1px #000;padding:5px;">
   <fieldset> <select class="form-control formselect required departmentselect{{$sno}}"  name="department[{{$sno}}]" value="{{$companydepartment->name}}" placeholder="Select Category"
                            id="dep{{$sno}}">
   
                            <option value="0" disabled selected>Select
                                Main Category*</option>
                            @foreach($department as $companydepartment)
                            <option  value="{{ $companydepartment->name }}">
                               {{ $companydepartment->name }}</option>
                            @endforeach
                        </select>   </td>
                                       <td class="border1">
										<input type="date" name="date1[{{$sno}}]">
                                       </td>
                                       <td class="border1"><input type="time" name="start_time[{{$sno}}]"> </td>
                                       <td class="border1"><input type="time" name="end_time[{{$sno}}]"> </td>
                                       <td  class="border1"> 
 <fieldset>
                                          
 <select class="form-control formselect required auditor{{$sno}}" name="auditor[{{$sno}}]"  placeholder="Select Sub Category" id="aud{{$sno}}"  >
                </select>
                                          </fieldset>
										
										
										</td>



 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<script>

          $(document).ready(function (e) {
    $('.departmentselect{{$sno}}').on('change', function () {

var id=$(this).attr('id');
console.log(id);
$('.auditor{{$sno}}').empty();
       var department{{$sno}}=$('.departmentselect{{$sno}}').val();

console.log(department{{$sno}});
var op{{$sno}}=" ";
    $.ajax({
        type: "POST",
		headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
		data: {
            "department{{$sno}}": $('.departmentselect{{$sno}}').val(),
        },
        url: '../../auditorsearch/'+department{{$sno}},
         dataType: "json",

       
        success: function (data) {

op{{$sno}}+='<option value="0" selected disabled>chose product</option>';
console.log(data.length);
					for(var i=0;i<data.length;i++){
					op{{$sno}}+='<option value="'+data[i].name+'">'+data[i].name+'</option>';
				   }

 $(".auditor{{$sno}}").append(op{{$sno}});


              console.log(data);

        },
  error: function (data) {
              $('#msg').html('hai');
        },  

    });
    });
});
</script>
<td class="border1">

									@foreach($auditee as $companyauditee)

<fieldset>
<label class="custom-control custom-checkbox">
<input type="checkbox" name="auditee[{{$sno}}][]"  class="custom-control-input" aria-invalid="false" value="{{$companyauditee->name}}" ><span class="custom-control-label">{{$companyauditee->name}}</span> </label>
</fieldset>


@endforeach

</td>
                                       <td class="border1">
										 <fieldset>
                                           <select name="document_ref[{{$sno}}]">
									<option>Select Document</option>
								
									<option value="DocumentRef1">DocumentRef1</option>
									<option value="DocumentRef2">DocumentRef2</option>
								
											</select>
                                          </fieldset>
										</td>
                                       <td class="border1">
										 <fieldset>
                                           <select name="relevant[{{$sno}}]">
									<option>Select Relevant</option>
								
									<option value="relevant1">relevant1</option>
									<option value="relevant2">relevant2</option>
								
											</select>
                                          </fieldset>
									 </td>
                                       <td class="border1"><input type="text" name="remarks[{{$sno}}]"> </td>
                 </tr>
 
                      @endforeach          </tbody>
                            </table>
                           </div>
<br/>
 <button type="submit" class="btn btn-info" id="checkBtn">SUBMIT</button> 
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

           
          {{$sno++}}           

<script>
var row={{$sno}}; 

  $(document).on("click", "#add-row", function () {
var new="";
  var new_row += '<tr id="row'+row+'"> <td class="border1">'+row+'</td> <td class="border1"><fieldset><select name="activity['+row+']"><option>Select Activity</option><option>Audit</option><option>Open Meeting</option><option>Lunch Break</option><option>Meeting</option></select></fieldset></td> <td style="border:solid 1px #000;padding:5px;">   <fieldset> <select class="form-control formselect required departmentselect'+row+'"  name="department['+row+']" value="{{$companydepartment->name}}" placeholder="Select Category"                            id="dep'+row+'">                               <option value="0" disabled selected>Select                                Main Category*</option>                            @foreach($department as $companydepartment)                            <option  value="{{ $companydepartment->name }}">                               {{ $companydepartment->name }}</option>                            @endforeach                        </select>   </td>                                       <td class="border1">										<input type="date" name="date1['+row+']">                                       </td>                                       <td class="border1"><input type="time" name="start_time['+row+']"> </td>                                       <td class="border1"><input type="time" name="end_time['+row+']"> </td>                                       <td  class="border1">  <fieldset>                                           <select class="form-control formselect required auditor'+row+'" name="auditor['+row+']"  placeholder="Select Sub Category" id="aud'+row+'"  >                </select>                                          </fieldset>																														</td><td class="border1">@foreach($auditee as $companyauditee)<fieldset><label class="custom-control custom-checkbox"><input type="checkbox" name="auditee['+row+'][]"  class="custom-control-input" aria-invalid="false" value="{{$companyauditee->name}}" ><span class="custom-control-label">{{$companyauditee->name}}</span> </label></fieldset>@endforeach</td><td class="border1"><fieldset><select name="document_ref['+row+']"><option>Select Document</option><option value="DocumentRef1">DocumentRef1</option><option value="DocumentRef2">DocumentRef2</option></select></fieldset></td><td class="border1"><fieldset><select name="relevant['+row+']"><option>Select Relevant</option><option value="relevant1">relevant1</option><option value="relevant2">relevant2</option></select></fieldset></td><td class="border1"><input type="text" name="remarks['+row+']"> </td><td  class="border1"><input class="delete-row btn btn-info" type="button" value="Delete" /></td></tr>';
  
   
  $('#dynamic_field').append(new_row);

  row++;
  return false;

  });
  
  // Remove criterion
  $(document).on("click", ".delete-row", function () {
    alert("Do you want to Delete this Row?");
    if(row>1) {
      $(this).closest('tr').remove();
      row--;
    }
  return false;
  });

</script>

<div class="col-md-6">
                <h3>Category<span class="gcolor"></span> </h3>
                <div class="form-s2">
                    <div>
                        <select class="form-control formselect required" placeholder="Select Category"
                            id="departmentselect1">
   
                            <option value="0" disabled selected>Select
                                Main Category*</option>
                            @foreach($department as $companydepartment)
                            <option  value="{{ $companydepartment->name }}">
                               {{ $companydepartment->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h3>Sub Category*</h3>
                <select class="form-control formselect required" placeholder="Select Sub Category" id="auditor1"  >
                </select>
            </div>


<div class="col-md-6">
                <h3>Category<span class="gcolor"></span> </h3>
                <div class="form-s2">
                    <div>
                        <select class="form-control formselect required" placeholder="Select Category"
                            id="departmentselect2">
   
                            <option value="0" disabled selected>Select
                                Main Category*</option>
                            @foreach($department as $companydepartment)
                            <option  value="{{ $companydepartment->name }}">
                               {{ $companydepartment->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h3>Sub Category*</h3>
                <select class="form-control formselect required" placeholder="Select Sub Category" id="auditor2"  >
                </select>
            </div>
<span id="msg"></span>


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