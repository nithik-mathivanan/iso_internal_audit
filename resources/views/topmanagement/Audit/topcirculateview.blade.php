@extends('topmanagement.layouts.app')


@section('content')
 <div class="page-wrapper">
           
            <div class="row page-titles">
               <div class="col-md-5 align-self-center">
                  <h3 class="text-themecolor">AUDIT PROGRAM</h3>
               </div>
            </div>
			
            <div class="container-fluid">
            
              
                        <div class="">
                

	<form action="{{ route('topcirculateupdate') }}" method="post">
@foreach($auditprogram as $companyscope)
 <?php 
$month=$companyscope->start;
$frequency=$companyscope->audit_frequency;
$status1=$companyscope->status;
$status=$companyscope->status;
$draft=$companyscope->draft;
$company=$companyscope->company;
?>
@endforeach
 <?php  


$monthstart = date('M-Y', strtotime($month) );
$monthend = date('M-Y', strtotime($month . "+11 months") );
$monthhalf = date('M-Y', strtotime($month . "+5 months") );
$monthhalf1 = date('M-Y', strtotime($month . "+6 months") );
$monthquater1 = date('M-Y', strtotime($month . "+2 months") );
$monthquater11 = date('M-Y', strtotime($month . "+3 months") );
$monthquater2 = date('M-Y', strtotime($month . "+5 months") );
$monthquater21 = date('M-Y', strtotime($month . "+6 months") );
$monthquater3 = date('M-Y', strtotime($month . "+8 months") );
$monthquater31 = date('M-Y', strtotime($month . "+9 months") );
$month1 = date('M', strtotime($month) );
$month2 = date('M', strtotime($month . "+1 months") );
$month3 = date('M', strtotime($month . "+2 months") );
$month4 = date('M', strtotime($month . "+3 months") );
$month5 = date('M', strtotime($month . "+4 months") );
$month6 = date('M', strtotime($month . "+5 months") );
$month7 = date('M', strtotime($month . "+6 months") );
$month8 = date('M', strtotime($month . "+7 months") );
$month9 = date('M', strtotime($month . "+8 months") );
$month10 = date('M', strtotime($month . "+9 months") );
$month11 = date('M', strtotime($month . "+10 months") );
$month12 = date('M', strtotime($month . "+11 months") );
?>
<div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title"> AUDIT PROGRAM</h4>
                           <h6 class="card-subtitle"> {{$status}}{{$draft}}</h6>
                           <div class="table-responsive">
  <h5><?php echo "From: ".$monthstart; ?> TO <?php echo $monthend; ?></h5>

<?php
if ($frequency=='annual'){


?>
                              <table class="table color-table success-table" style="font-size:10px; ">
                                 <thead class="border">
                                    <tr>
                                       
                                       <th class="classtest">Process/ Dept /Location</th>
                                       <th class="classtest">P/A</th>
                                       <th class="isotable2"><span > <?php echo $month1; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month2; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month3; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month4; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month5; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month6; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month7; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month8; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month9; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month10; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month11; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month12; ?>  </span></th>
                                        
                                        
                                       <th class="classtest">REMARKS</th>
                                       <th class="classtest">AUDIT PLAN CUM REPORT</th>
                                    </tr>
                                 </thead>
                                 <tbody >

<tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA/".$monthstart; ?>-<?php echo $monthend; ?></td></tr>
@foreach($auditprogram as $companydepartment)

<?php $radio=$sno++; ?>
                                    <tr class="border">
                                    
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="id[<?php echo $radio; ?>]"  style="display:none"value="{{$companydepartment->id}}">
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthstart; ?>-<?php echo $monthend; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment->department}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month1) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>
                                          
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month2) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month3) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month4) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                        
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month5) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month6) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month7) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                        
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month8) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month9) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month10) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                        
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month11) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment->plan==$month12) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>
                                          
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]" value="{{$companydepartment->remarks}}" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach

<?php 
$str=$companydepartment->scope;
$array1=explode(",",$str); 


$str1=$companydepartment->standard;
$array2=explode(",",$str1); 

?>

<div class="row">
<div class="col-md-6">
                                                <div class="form-group ">
											  <label class="control-label">Scope of Mgmt System</label>
{{ csrf_field() }} 
@foreach($scope1 as $companyscope)
											<fieldset>
                                             <label class="custom-control custom-checkbox">
<input type="checkbox" name="scope[]"  class="custom-control-input" aria-invalid="false" value="{{$companyscope->name}}" @foreach ($array1 as $item) 
<?php if ($item==$companyscope->name){echo "checked";}?>
@endforeach ><span class="custom-control-label">{{$companyscope->name}}</span> </label>
                                          </fieldset>

@endforeach
											</div>


                                            </div>


<div class="col-md-6">
                                                <div class="form-group ">
											  <label class="control-label">Standard of Mgmt System</label>
{{ csrf_field() }} 
@foreach($standard1 as $companystandard)
											<fieldset>
                                             <label class="custom-control custom-checkbox">
<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$companystandard->name}}" @foreach ($array2 as $item) 
<?php if ($item==$companystandard->name){echo "checked";}?>
@endforeach ><span class="custom-control-label">{{$companystandard->name}}</span> </label>
                                          </fieldset>

@endforeach
											</div>


                                            </div>
                                            </div>

                                     </tbody>
                              </table>
                          


<?php 

}
?>
<!-- HalfYearly -->
<?php

if ($frequency=='halfyearly'){


?>
                             <table class="table color-table success-table" style="font-size:10px; ">
                                 <thead class="border">
                                    <tr>
                                       
                                       <th class="classtest">Process/ Dept /Location</th>
                                       <th class="classtest">P/A</th>
                                       <th class="isotable2"><span > <?php echo $month1; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month2; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month3; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month4; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month5; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month6; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month7; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month8; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month9; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month10; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month11; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month12; ?>  </span></th>
                                        
                                        
                                       <th class="classtest">REMARKS</th>
                                       <th class="classtest">AUDIT PLAN CUM REPORT</th>
                                    </tr>
                                 </thead>
                                 <tbody >
                                   <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number:  <?php echo "IA/".$monthstart; ?>-<?php echo $monthhalf; ?></td></tr>
@foreach($auditprogram1 as $companydepartment1)

<?php $radio=$sno++; ?>
                                     <tr class="border">
                                    <td  style="display:none"> <input type="text" name="id[<?php echo $radio; ?>]" value="{{$companydepartment1->id}}"></td>
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthstart; ?>-<?php echo $monthhalf; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment1->department}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment1->plan==$month1) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment1->plan==$month2) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment1->plan==$month3) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment1->plan==$month4) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment1->plan==$month5) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment1->plan==$month6) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                            </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                              </label></div>
                                           
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]"  value="{{$companydepartment1->remarks}}"class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach
        
    <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number:  <?php echo "IA/".$monthhalf1; ?>-<?php echo $monthend; ?></td></tr>
@foreach($auditprogram2 as $companydepartment2)

<?php $radio=$sno++; ?>
                                     <tr class="border">
                                     <td  style="display:none"> <input type="text" name="id[<?php echo $radio; ?>]" value="{{$companydepartment2->id}}"></td>
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthstart; ?>-<?php echo $monthhalf; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment2->department}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                              </label></div>
                                          
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                              </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                            </label></div>
                                          
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                              </label></div>
                                           
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment2->plan==$month7) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment2->plan==$month8) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment2->plan==$month9) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment2->plan==$month10) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment2->plan==$month11) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>
                                          
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment2->plan==$month12) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>
                                          
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]"  value="{{$companydepartment2->remarks}}" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach

<?php 
$str=$companydepartment2->scope;
$array1=explode(",",$str); 


$str1=$companydepartment2->standard;
$array2=explode(",",$str1); 

?>

<div class="row">
<div class="col-md-6">
                                                <div class="form-group ">
											  <label class="control-label">Scope of Mgmt System</label>
{{ csrf_field() }} 
@foreach($scope1 as $companyscope)
											<fieldset>
                                             <label class="custom-control custom-checkbox">
<input type="checkbox" name="scope[]"  class="custom-control-input" aria-invalid="false" value="{{$companyscope->name}}" @foreach ($array1 as $item) 
<?php if ($item==$companyscope->name){echo "checked";}?>
@endforeach ><span class="custom-control-label">{{$companyscope->name}}</span> </label>
                                          </fieldset>

@endforeach
											</div>


                                            </div>


<div class="col-md-6">
                                                <div class="form-group ">
											  <label class="control-label">Standard of Mgmt System</label>
{{ csrf_field() }} 
@foreach($standard1 as $companystandard)
											<fieldset>
                                             <label class="custom-control custom-checkbox">
<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$companystandard->name}}" @foreach ($array2 as $item) 
<?php if ($item==$companystandard->name){echo "checked";}?>
@endforeach ><span class="custom-control-label">{{$companystandard->name}}</span> </label>
                                          </fieldset>

@endforeach
											</div>


                                            </div>
                                            </div>
                                     </tbody>
                              </table>
                          

<?php 

}
?>




<?php

if ($frequency=='quaterly'){


?>
                             <table class="table color-table success-table" style="font-size:10px; ">
                                 <thead class="border">
                                    <tr>
                                       
                                       <th class="classtest">Process/ Dept /Location</th>
                                       <th class="classtest">P/A</th>
                                       <th class="isotable2"><span > <?php echo $month1; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month2; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month3; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month4; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month5; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month6; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month7; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month8; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month9; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month10; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month11; ?>  </span></th>
                                       <th class="isotable2"><span > <?php echo $month12; ?>  </span></th>
                                        
                                        
                                       <th class="classtest">REMARKS</th>
                                       <th class="classtest">AUDIT PLAN CUM REPORT</th>
                                    </tr>
                                 </thead>
                                 <tbody >
                                   <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA/".$monthstart; ?>-<?php echo $monthquater1; ?></td></tr>
@foreach($auditprogram1 as $companydepartment1)

<?php $radio=$sno++; ?>
                                      <tr class="border">
                                     <td  style="display:none"> <input type="text" name="id[<?php echo $radio; ?>]"value="{{$companydepartment1->id}}"></td>
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthstart; ?>-<?php echo $month1; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment1->department}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment1->plan==$month1) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment1->plan==$month2) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                        
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment1->plan==$month3) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                        
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                            </label></div>
                                        
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                            </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                            </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                              </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                        
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                        
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]"  value="{{$companydepartment1->remarks}}" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach
 <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA/".$monthquater11; ?>-<?php echo $monthquater2; ?></td></tr>
@foreach($auditprogram2 as $companydepartment2)

<?php $radio=$sno++; ?>
                                     <tr class="border">
                                     <td style="display:none"> <input type="text" name="id[<?php echo $radio; ?>]"  value="{{$companydepartment2->id}}"></td>
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthquater11; ?>-<?php echo $month2; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment2->department}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                              </label></div>
                                        
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment2->plan==$month4) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment2->plan==$month5) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                        
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment2->plan==$month6) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                        
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                        
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                       
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]" value="{{$companydepartment2->remarks}}" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach


 <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA/".$monthquater21; ?>-<?php echo $monthquater3; ?></td></tr>
@foreach($auditprogram3 as $companydepartment3)

<?php $radio=$sno++; ?>
                                    <tr class="border">
                                     <td  style="display:none"> <input type="text" name="id[<?php echo $radio; ?>]" value="{{$companydepartment3->id}}"></td>
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthquater21; ?>-<?php echo $month3; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment3->department}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                        
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                            </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                           
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                           
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment3->plan==$month7) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                        
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment3->plan==$month8) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment3->plan==$month9) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                            
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                            
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                           
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                           
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]"  value="{{$companydepartment3->remarks}}" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach


 <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA/".$monthquater31; ?>-<?php echo $monthend; ?></td></tr>
@foreach($auditprogram4 as $companydepartment4)

<?php $radio=$sno++; ?>
                                      <tr class="border">
                                     <td style="display:none"> <input type="text" name="id[<?php echo $radio; ?>]"  value="{{$companydepartment4->id}}"></td>
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthquater31; ?>-<?php echo $monthend; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment4->department}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                          
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                              </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                              </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                            </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                              </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment4->plan==$month10) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                          
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment4->plan==$month11) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                          
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input" <?php if($companydepartment4->plan==$month12) echo "checked" ?>><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]"  value="{{$companydepartment4->remarks}}" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach

<?php 
$str=$companydepartment4->scope;
$array1=explode(",",$str); 


$str1=$companydepartment4->standard;
$array2=explode(",",$str1); 

?>

<div class="row">
<div class="col-md-6">
                                                <div class="form-group ">
											  <label class="control-label">Scope of Mgmt System</label>
{{ csrf_field() }} 
@foreach($scope1 as $companyscope)
											<fieldset>
                                             <label class="custom-control custom-checkbox">
<input type="checkbox" name="scope[]"  class="custom-control-input" aria-invalid="false" value="{{$companyscope->name}}" @foreach ($array1 as $item) 
<?php if ($item==$companyscope->name){echo "checked";}?>
@endforeach ><span class="custom-control-label">{{$companyscope->name}}</span> </label>
                                          </fieldset>

@endforeach
											</div>


                                            </div>


<div class="col-md-6">
                                                <div class="form-group ">
											  <label class="control-label">Standard of Mgmt System</label>
{{ csrf_field() }} 
@foreach($standard1 as $companystandard)
											<fieldset>
                                             <label class="custom-control custom-checkbox">
<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$companystandard->name}}" @foreach ($array2 as $item) 
<?php if ($item==$companystandard->name){echo "checked";}?>
@endforeach ><span class="custom-control-label">{{$companystandard->name}}</span> </label>
                                          </fieldset>

@endforeach
											</div>


                                            </div>
                                            </div>


                                 </tbody>
                              </table>
                          

<?php 

}
?>








 </div> 

</form>
<form action="{{ route('auditprogrampdf2') }}" style="display: inline-block;">
   <input value="{{request()->route('companyid')}}" name="companyid" style="display: none;">
   <input value="{{request()->route('frequency')}}" name="frequency" style="display:none;">
   <input value="<?php echo $monthstart; ?>" name="start" style="display:none ;">
   <input value="<?php echo $monthend; ?>" name="end" style="display:none ;">
   <button class="btn btn-info">Print</button>
</form>
 <!-- <h4 class="card-title" ></h4>
                           <p  class="isotext"> P – Plan , A- Actual  Status.</p>
                           <h4 class="card-title" ></h4>
                           <h5 style="isotext"><img src="{{ asset('img/blue.jpg') }}"><span style="padding:10px;">Planned </span><img src="{{ asset('img/green.jpg') }}"> <span style="padding:10px;">Completed </span><img src="{{ asset('img/yellow.jpg') }}"> <span style="padding:10px;">Pre/Postponed </span><img src="{{ asset('img/red.jpg') }}"><span style="padding:10px;"> Cancelled</span></h5>
                           <h4 class="card-title" ></h4>
                           <h5 style="isotext"><img src="{{ asset('img/grey.jpg') }}"><span style="padding:10px;">Partially completed (applicable only for process audited by multiple auditor like project audit) </span></h5> -->
                        </div>
                     </div>
                  </div>
               </div>
             
              </div>
             </div>
           
             
            </div>
         

@endsection
