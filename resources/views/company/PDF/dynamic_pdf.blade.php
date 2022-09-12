<html>
 <style>
      @font-face {
        font-family: 'Helvetica';
        font-weight: normal;
        font-style: normal;
        font-variant: normal;
        src: url('<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">');
      } 
	h1, h2, h3, h4, h5, h6 {
    color: #455a64;
    font-family: "Poppins", sans-serif;
    font-weight: 400;
	}
      body {
       font-family: "Poppins", sans-serif;
      }
      .custom-checkbox .custom-control-input:checked~.custom-control-label::after {
    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26l2.974 2.99L8 2.193z'/%3e%3c/svg%3e);
	}.custom-radio .custom-control-label::before {
    border-radius: 50%;
}.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: #007bff;
    background-color: #007bff;
}
	.custom-control-label::after {
	    position: absolute;
	    top: 0.25rem;
	    left: -1.5rem;
	    display: block;
	    width: 1rem;
	    height: 1rem;
	    content: "";
	    background: no-repeat 50%/50% 50%;
	}
	.card-title {
    margin-bottom: 0.75rem;
    font-family: "Poppins", sans-serif;
	}
	h4 {
    line-height: 22px;
    font-size: 18px;
    font-family: "Poppins", sans-serif;
	}
	.card-subtitle {
    margin-bottom: 15px;
    color: #99abb4;
    font-family: "Poppins", sans-serif;
	}
	.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: #007bff;
    background-color: #007bff;
	}
	.border {
    border: solid 1px #000!important;
	}
	.audit_num {
    padding: 10px !important;
    text-align: center;
    font-size: 14px;
	}
	
</style>
<body>
<div class="page-wrapper">
@foreach($auditprogram as $companyscope)
 <?php 
$month=$companyscope->start;
$frequency=$companyscope->audit_frequency;
$status=$companyscope->status;
$draft=$companyscope->draft;
?>
@endforeach

<h4 class="card-title" style="line-height:15px"> Title : AUDIT PROGRAM</h4>
<p class="card-subtitle" style="font-size: 20px;color:#67757c;">Status: {{$status}}{{$draft}}</p>
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
<?php
if ($frequency=='annual'){
?>
	
<table class="table color-table success-table" style="font-size:10px;width: 100%;">
<thead class="">
@foreach($auditprogram as $companydepartment)

<?php 
$str=$companydepartment->scope;
$array1=explode(",",$str); 


$str1=$companydepartment->standard;
$array2=explode(",",$str1); 

?>
@endforeach

<tr>
<td colspan="6">
<label class="control-label" style="font-size: 20px;color:#67757c;">Scope of Mgmt System</label>
@foreach($scope1 as $companyscope)
											<fieldset style="border:none">
															<label class="custom-control custom-checkbox">
<input type="checkbox" name="scope[]"  class="custom-control-input" aria-invalid="false" value="{{$companyscope->name}}" @foreach ($array1 as $item) 
<?php if ($item==$companyscope->name){echo "checked";}?>
@endforeach style="font-size:14px"> <span class="custom-control-label" style="position: relative;
    margin-bottom: 0;font-size: 18px;color: #67757c;">{{$companyscope->name}}</span> </label>
														</fieldset>

@endforeach
</td>

<td colspan="6">
<label class="control-label" style="font-size: 20px;color:#67757c">Standard of Mgmt System</label>
@foreach($standard1 as $companystandard)
											<fieldset style="border:none">
															<label class="custom-control custom-checkbox">
<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$companystandard->name}}" @foreach ($array2 as $item) 
<?php if ($item==$companystandard->name){echo "checked";}?>
@endforeach  style="font-size:14px" > <span class="custom-control-label"  style="position: relative;
    margin-bottom: 0;font-size: 18px;color: #67757c;">{{$companystandard->name}}</span> </label>
														</fieldset>

@endforeach
</td>
</tr>

<tr>

<th class="classtest" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff">Process/ Dept /Location</th>
<th class="classtest" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff">P/A</th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span ><?php echo $month1; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month2; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month3; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month4; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month5; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month6; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month7; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month8; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month9; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month10; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month11; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month12; ?> </span></th>


</tr>
</thead>
<tbody >
<tr class="border" style="text-align :center;" >
<td  colspan="16" class="border audit_num"  style=""> Audit Number: <?php echo "IA-".$monthstart; ?>-<?php echo $monthend; ?></td></tr>

@foreach($auditprogram as $companydepartment)
<?php $radio=$sno++; ?>
<tr class="border">
<td class="border"  style="border:1px solid black;text-align:center;font-size: 15px"> {{$companydepartment->department}}
</td>
<td class="border" style="border:1px solid black;text-align:center;">

<div class="isotable6 ">P</div>
<div class="isotable6 ">A</div>

</td>
<td class="border"  style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment->plan==$month1) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment->plan==$month2) echo "checked" ?> ><span class="custom-control-label" ></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment->plan==$month3) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment->plan==$month4) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment->plan==$month5) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment->plan==$month6) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment->plan==$month7) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment->plan==$month8) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment->plan==$month9) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment->plan==$month10) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment->plan==$month11) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment->plan==$month12) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>

</tr>
@endforeach
</tbody>
</table>
<?php 

}
?>

<?php

if ($frequency=='halfyearly'){


?>
	
<table class="table color-table success-table" style="font-size:10px;width: 100%;">
<thead class="">
@foreach($auditprogram1 as $companydepartment1)

<?php 
$str=$companydepartment1->scope;
$array1=explode(",",$str); 


$str1=$companydepartment1->standard;
$array2=explode(",",$str1); 

?>
@endforeach

<tr>
<td colspan="6">
<label class="control-label" style="font-size: 20px;color:#67757c;">Scope of Mgmt System</label>
@foreach($scope1 as $companyscope)
											<fieldset style="border:none">
															<label class="custom-control custom-checkbox">
<input type="checkbox" name="scope[]"  class="custom-control-input" aria-invalid="false" value="{{$companyscope->name}}" @foreach ($array1 as $item) 
<?php if ($item==$companyscope->name){echo "checked";}?>
@endforeach style="font-size:14px"> <span class="custom-control-label" style="position: relative;
    margin-bottom: 0;font-size: 18px;color: #67757c;">{{$companyscope->name}}</span> </label>
														</fieldset>

@endforeach
</td>

<td colspan="6">
<label class="control-label" style="font-size: 20px;color:#67757c">Standard of Mgmt System</label>
@foreach($standard1 as $companystandard)
											<fieldset style="border:none">
															<label class="custom-control custom-checkbox">
<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$companystandard->name}}" @foreach ($array2 as $item) 
<?php if ($item==$companystandard->name){echo "checked";}?>
@endforeach  style="font-size:14px" > <span class="custom-control-label"  style="position: relative;
    margin-bottom: 0;font-size: 18px;color: #67757c;">{{$companystandard->name}}</span> </label>
														</fieldset>

@endforeach
</td>
</tr>

<tr>

<th class="classtest" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff">Process/ Dept /Location</th>
<th class="classtest" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff">P/A</th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span ><?php echo $month1; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month2; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month3; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month4; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month5; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month6; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month7; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month8; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month9; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month10; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month11; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month12; ?> </span></th>


</tr>
</thead>
<tbody >
  <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number:  <?php echo "IA-".$monthstart; ?>-<?php echo $monthhalf; ?>-001</td></tr>
@foreach($auditprogram1 as $companydepartment1)
<?php $radio=$sno++; ?>
<tr class="border">
<td class="border"  style="border:1px solid black;text-align:center;font-size: 15px"> {{$companydepartment1->department}}
</td>
<td class="border" style="border:1px solid black;text-align:center;">

<div class="isotable6 ">P</div>
<div class="isotable6 ">A</div>

</td>
<td class="border"  style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>][<?php echo $radio; ?>]" class="custom-control-input" <?php if($companydepartment1->plan==$month1) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment1->plan==$month2) echo "checked" ?> ><span class="custom-control-label" ></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month3) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month4) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment1->plan==$month5) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month6) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment1->plan==$month7) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month8) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month9) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month10) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment1->plan==$month11) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment1->plan==$month12) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>

</tr>
@endforeach



<tr class="border"><td  colspan="16" class="border audit_num" > Audit Number:  <?php echo "IA-".$monthhalf1; ?>-<?php echo $monthend; ?>-002</td></tr>
@foreach($auditprogram2 as $companydepartment2)
<?php $radio=$sno++; ?>

<tr class="border">
<td class="border"  style="border:1px solid black;text-align:center;font-size: 15px"> {{$companydepartment2->department}}
</td>
<td class="border" style="border:1px solid black;text-align:center;">

<div class="isotable6 ">P</div>
<div class="isotable6 ">A</div>

</td>
<td class="border"  style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month1) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment2->plan==$month2) echo "checked" ?> ><span class="custom-control-label" ></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month3) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month4) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment2->plan==$month5) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month6) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment2->plan==$month7) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month8) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month9) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month10) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment2->plan==$month11) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment2->plan==$month12) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

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
	
<table class="table color-table success-table" style="font-size:10px;width: 100%;">
<thead class="">
@foreach($auditprogram1 as $companydepartment1)

<?php 
$str=$companydepartment1->scope;
$array1=explode(",",$str); 


$str1=$companydepartment1->standard;
$array2=explode(",",$str1); 

?>
@endforeach

<tr>
<td colspan="6">
<label class="control-label" style="font-size: 20px;color:#67757c;">Scope of Mgmt System</label>
@foreach($scope1 as $companyscope)
											<fieldset style="border:none">
															<label class="custom-control custom-checkbox">
<input type="checkbox" name="scope[]"  class="custom-control-input" aria-invalid="false" value="{{$companyscope->name}}" @foreach ($array1 as $item) 
<?php if ($item==$companyscope->name){echo "checked";}?>
@endforeach style="font-size:14px"> <span class="custom-control-label" style="position: relative;
    margin-bottom: 0;font-size: 18px;color: #67757c;">{{$companyscope->name}}</span> </label>
														</fieldset>

@endforeach
</td>

<td colspan="6">
<label class="control-label" style="font-size: 20px;color:#67757c">Standard of Mgmt System</label>
@foreach($standard1 as $companystandard)
											<fieldset style="border:none">
															<label class="custom-control custom-checkbox">
<input type="checkbox" name="standard[]"  class="custom-control-input" aria-invalid="false" value="{{$companystandard->name}}" @foreach ($array2 as $item) 
<?php if ($item==$companystandard->name){echo "checked";}?>
@endforeach  style="font-size:14px" > <span class="custom-control-label"  style="position: relative;
    margin-bottom: 0;font-size: 18px;color: #67757c;">{{$companystandard->name}}</span> </label>
														</fieldset>

@endforeach
</td>
</tr>

<tr>

<th class="classtest" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff">Process/ Dept /Location</th>
<th class="classtest" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff">P/A</th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span ><?php echo $month1; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month2; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month3; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month4; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month5; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month6; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month7; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month8; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month9; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month10; ?> </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month11; ?>  </span></th>
<th class="isotable2" style="border:1px solid black !important;padding: 5px;background-color: #1976d2;text-align:center;font-size:14px;color:#fff"><span > <?php echo $month12; ?> </span></th>


</tr>
</thead>
<tbody >
<tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA-".$monthstart; ?>-<?php echo $monthquater1; ?>-001</td></tr>
@foreach($auditprogram1 as $companydepartment1)
<?php $radio=$sno++; ?>
<tr class="border">
<td class="border"  style="border:1px solid black;text-align:center;font-size: 15px"> {{$companydepartment1->department}}
</td>
<td class="border" style="border:1px solid black;text-align:center;">

<div class="isotable6 ">P</div>
<div class="isotable6 ">A</div>

</td>
<td class="border"  style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>][<?php echo $radio; ?>]" class="custom-control-input" <?php if($companydepartment1->plan==$month1) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment1->plan==$month2) echo "checked" ?> ><span class="custom-control-label" ></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month3) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month4) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment1->plan==$month5) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month6) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment1->plan==$month7) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month8) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month9) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment1->plan==$month10) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment1->plan==$month11) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment1->plan==$month12) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>

</tr>
@endforeach


 <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA-".$monthquater11; ?>-<?php echo $monthquater2; ?>-002</td></tr>
@foreach($auditprogram2 as $companydepartment2)
<?php $radio=$sno++; ?>

<tr class="border">
<td class="border"  style="border:1px solid black;text-align:center;font-size: 15px"> {{$companydepartment2->department}}
</td>
<td class="border" style="border:1px solid black;text-align:center;">

<div class="isotable6 ">P</div>
<div class="isotable6 ">A</div>

</td>
<td class="border"  style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month1) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment2->plan==$month2) echo "checked" ?> ><span class="custom-control-label" ></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month3) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month4) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment2->plan==$month5) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month6) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment2->plan==$month7) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month8) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month9) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment2->plan==$month10) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment2->plan==$month11) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment2->plan==$month12) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>

</tr>
@endforeach

 <tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA-".$monthquater21; ?>-<?php echo $monthquater3; ?>-003</td></tr>
@foreach($auditprogram3 as $companydepartment3)
<?php $radio=$sno++; ?>

<tr class="border">
<td class="border"  style="border:1px solid black;text-align:center;font-size: 15px"> {{$companydepartment3->department}}
</td>
<td class="border" style="border:1px solid black;text-align:center;">

<div class="isotable6 ">P</div>
<div class="isotable6 ">A</div>

</td>
<td class="border"  style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment3->plan==$month1) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment3->plan==$month2) echo "checked" ?> ><span class="custom-control-label" ></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment3->plan==$month3) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment3->plan==$month4) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment3->plan==$month5) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment3->plan==$month6) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment3->plan==$month7) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment3->plan==$month8) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment3->plan==$month9) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment3->plan==$month10) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment3->plan==$month11) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment3->plan==$month12) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>

</tr>
@endforeach

<tr class="border"><td  colspan="16" class="border audit_num" > Audit Number: <?php echo "IA-".$monthquater31; ?>-<?php echo $monthend; ?>-004</td></tr>
@foreach($auditprogram4 as $companydepartment4)
<?php $radio=$sno++; ?>

<tr class="border">
<td class="border"  style="border:1px solid black;text-align:center;font-size: 15px"> {{$companydepartment4->department}}
</td>
<td class="border" style="border:1px solid black;text-align:center;">

<div class="isotable6 ">P</div>
<div class="isotable6 ">A</div>

</td>
<td class="border"  style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month1; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment4->plan==$month1) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month2; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment4->plan==$month2) echo "checked" ?> ><span class="custom-control-label" ></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month3; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment4->plan==$month3) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month4; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment4->plan==$month4) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month5; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment4->plan==$month5) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month6; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment4->plan==$month6) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month7; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment4->plan==$month7) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month8; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment4->plan==$month8) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month9; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment4->plan==$month9) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month10; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input" <?php if($companydepartment4->plan==$month10) echo "checked" ?>><span class="custom-control-label"></span> </label></div>

</td><td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month11; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment4->plan==$month11) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>
<td class="border" style="border:1px solid black">

<div class="isotable16"><label class="custom-control custom-radio   isotable6 ">
<input type="radio" value="<?php echo $month12; ?>" name="styled_radio[<?php echo $radio; ?>]" required="" id="styled_radio[<?php echo $radio; ?>]1" class="custom-control-input"<?php if($companydepartment4->plan==$month12) echo "checked" ?>><span class="custom-control-label" ></span> </label></div>

</td>

</tr>
@endforeach
</tbody>
</table>
<?php 
}

?>

</body>
</html>