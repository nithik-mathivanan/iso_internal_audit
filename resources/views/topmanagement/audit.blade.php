@extends('topmanagement.layouts.app')


@section('content')
 <div class="page-wrapper">
           
            <div class="row page-titles">
               <div class="col-md-5 align-self-center">
                  <h3 class="text-themecolor">AUDIT PROGRAM</h3>
               </div>
            </div>
			
            <div class="container-fluid">
            
              
                        <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title"> AUDIT PROGRAM</h4>
                           <h6 class="card-subtitle"> (Rev.0)</h6>
                           <div class="table-responsive">

<form action="{{ route('audit') }}" method="post">

 <?php  
$scope=$_POST['scope'];
$scopearr=implode(",",$scope);

$standard=$_POST['standard'];
$standardarr=implode(",",$standard);


$frequency=$_POST['frequency'];

$month=$_POST['month'];

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
<input type="text" name="scopearr" value="<?php echo $scopearr; ?>" class="none">
<input type="text" name="standardarr" value="<?php echo $standardarr; ?>" class="none">
<input type="text" name="frequency" value="<?php echo $frequency; ?>" class="none">
<input type="text" name="monthstart" value="<?php echo $monthstart; ?>" class="none">
<input type="text" name="monthend" value="<?php echo $monthend; ?>" class="none">
 <b><?php echo "From: ".$monthstart; ?> TO <?php echo $monthend; ?></b>
<?php
if ($frequency=='annual'){


?>
                              <table class="table color-table success-table" style="font-size:10px; ">
                                 <thead class="border">
                                   <tr>
                                       
                                       <th class="classtest">Process/ Dept /Location</th>
                                       <th class="classtest">P/A</th>
                                       <th class="isotable2"><span > <?php echo $month1; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month2; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month3; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month4; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month5; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month6; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month7; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month8; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month9; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month10; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month11; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month12; ?> | </span></th>
                                        
                                        
                                       <th class="classtest">REMARKS</th>
                                       <th class="classtest">AUDIT PLAN CUM REPORT</th>
                                    </tr>
                                 </thead>
                                 <tbody >
<tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA/".$monthstart; ?>-<?php echo $monthend; ?></td></tr>
@foreach($department1 as $companydepartment)

<?php $radio=$sno++; ?>
                                    <tr class="border">
                                    
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthstart; ?>-<?php echo $monthend; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment->name}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach
 
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
                                       <th class="isotable2"><span > <?php echo $month1; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month2; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month3; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month4; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month5; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month6; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month7; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month8; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month9; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month10; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month11; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month12; ?> | </span></th>
                                        
                                        
                                       <th class="classtest">REMARKS</th>
                                       <th class="classtest">AUDIT PLAN CUM REPORT</th>
                                    </tr>
                                 </thead>
                                 <tbody >
                                   <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number:  <?php echo "IA/".$monthstart; ?>-<?php echo $monthhalf; ?></td></tr>
@foreach($department1 as $companydepartment)

<?php $radio=$sno++; ?>
                                     <tr class="border">
                                    
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthstart; ?>-<?php echo $monthhalf; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment->name}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach
           <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA/".$monthhalf1; ?>-<?php echo $monthend; ?></td></tr>
@foreach($department1 as $companydepartment)

<?php $radio=$sno++; ?>
                                     <tr class="border">
                                    
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthhalf1; ?>-<?php echo $monthend; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment->name}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach


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
                                       <th class="isotable2"><span > <?php echo $month1; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month2; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month3; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month4; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month5; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month6; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month7; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month8; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month9; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month10; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month11; ?> | </span></th>
                                       <th class="isotable2"><span > <?php echo $month12; ?> | </span></th>
                                        
                                        
                                       <th class="classtest">REMARKS</th>
                                       <th class="classtest">AUDIT PLAN CUM REPORT</th>
                                    </tr>
                                 </thead>
                                 <tbody >
                                   <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA/".$monthstart; ?>-<?php echo $monthquater1; ?></td></tr>
@foreach($department1 as $companydepartment)

<?php $radio=$sno++; ?>
                                      <tr class="border">
                                    
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthstart; ?>-<?php echo $month1; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment->name}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach
 <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA/".$monthquater11; ?>-<?php echo $monthquater2; ?></td></tr>
@foreach($department1 as $companydepartment)

<?php $radio=$sno++; ?>
                                     <tr class="border">
                                    
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthquater11; ?>-<?php echo $month2; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment->name}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach


 <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA/".$monthquater21; ?>-<?php echo $monthquater3; ?></td></tr>
@foreach($department1 as $companydepartment)

<?php $radio=$sno++; ?>
                                    <tr class="border">
                                    
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthquater21; ?>-<?php echo $month3; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment->name}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach


 <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA/".$monthquater31; ?>-<?php echo $monthend; ?></td></tr>
@foreach($department1 as $companydepartment)

<?php $radio=$sno++; ?>
                                      <tr class="border">
                                    
                                       <td class="border">
{{csrf_field()}}
<input type="text" name="audit_num[<?php echo $radio; ?>]" class="remarks none"  value="IA/<?php echo $monthquater31; ?>-<?php echo $monthend; ?>" readonly>
                                          <div class="isotable4 ">
                                             <p> <input type="text" name="audit_dept[<?php echo $radio; ?>]" class="remarks"  value="{{$companydepartment->name}}" readonly> </p>
                                          </div>
                                     
                                       </td>
                                       <td class="border">

                                          <div class="isotable6 ">P</div>
                                          <div class="isotable6 ">A</div>
                                         
                                       </td>
                                       <td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td><td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
<td class="border">

                                             <div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
                                             <input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio1" class="custom-control-input"><span class="custom-control-label"></span> </label></div>
                                         
                                       </td>
                                       <td style="border:solid 1px #000;">

                                          <div class="isotable20"><input type="text" name="remarks[<?php echo $radio; ?>]" class="remarks"> </div>
                                          <div class="isotable20"> </div>
                                        
                                       </td>
                                       <td class="isotable21">

<div class="">Prepare / View Audit Plan cum Audit Report 
</div>
   </td>
 
                                    </tr>

@endforeach




                                 </tbody>
                              </table>
                          

<?php 

}
?>








 </div>
                           <button type="submit" class="btn btn-info">SEND FOR APPROVAL</button> <button type="submit" class="btn btn-info" style="margin-left:25px;">CIRCULATE </button> <button type="submit" class="btn btn-info" style="margin-left:25px;">PRINT </button>
</form>                          
 <h4 class="card-title" ></h4>
                           <p  class="isotext"> P – Plan , A- Actual  Status.</p>
                           <h4 class="card-title" ></h4>
                           <h5 style="isotext"><img src="{{ asset('img/blue.jpg') }}"><span style="padding:10px;">Planned </span><img src="{{ asset('img/green.jpg') }}"> <span style="padding:10px;">Completed </span><img src="{{ asset('img/yellow.jpg') }}"> <span style="padding:10px;">Pre/Postponed </span><img src="{{ asset('img/red.jpg') }}"><span style="padding:10px;"> Cancelled</span></h5>
                           <h4 class="card-title" ></h4>
                           <h5 style="isotext"><img src="{{ asset('img/grey.jpg') }}"><span style="padding:10px;">Partially completed (applicable only for process audited by multiple auditor like project audit) </span></h5>
                        </div>
                     </div>
                  </div>
               </div>
             
              </div>
             </div>
           
             
            </div>
         

@endsection
