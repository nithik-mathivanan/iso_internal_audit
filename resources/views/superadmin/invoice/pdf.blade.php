<?php  
use App\Invoice;
use App\Company;
use App\User;


$invoice=Invoice::find($request->id);
$company=Company::find($invoice->company);
$user=User::where(['company_id'=>$company->id])->first();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style>
    .page-break {
        page-break-after: always;
    }
    table {font-family: 'Montserrat', sans-serif;}
    </style>
    <table style="width:100%;">
      <tr>
        <td style="width: 50%;">
          <p>Billed To:</p>
           <p><h3><b>{{$company->company_name}}</b></h3></p>
           <p><?php echo nl2br($user->streetaddress); ?></p>
           <p>{{$user->zipcode}}</p>
           <p>{{$user->phone}}</p>
        </td>
        <td style="width: 50%;text-align: right;">
          <p>Generated By:</p>
       <p><h3><b>ISO Supporter</b></h3></p>
       <p>Company Address <br> 1234567</p>
        </td>
      </tr>
    </table>
    <hr>
    <table style="width: 100%">
      <tr><td style="font-size: 32px;color:#61b7f4;">#{{$invoice->uniqueid}}</td></tr>
      <tr><td style="color:grey;font-weight: bold;">Issue Date & Time : {{DATE('d-m-Y h:i A',strtotime($invoice->created_at))}}</td></tr>
    </table>
    
    <style type="text/css">
      #invoicedata td{border:1px solid white;}
    </style>

    <table id="invoicedata" style="margin-top:90px;width: 100%;text-align: center;border-collapse:collapse;border:1px solid white;" cellpadding="10" cellspacing="10">
      <tr><td style="color:white;background: green;width:10px;">#</td><td style="background: lightgrey;width:10px;">Package Name</td><td style="background: lightgrey;">Modules</td><td style="background: lightgrey;width:10px;">Package Amount</td><td style="background: lightgrey;width:10px;">Module Amount</td><td style="background: darkgrey;width:10px;">Total Amount</td></tr>
      <tr><td style="color:white;background: green;width:30px;">1</td><td style="background: lightgrey;">{{$invoice->packagename}}</td><td style="background: lightgrey;"><?php echo nl2br($invoice->toolsname); ?></td><td style="background: lightgrey;">{{$invoice->totalamount}}</td><td style="background: lightgrey;">{{$invoice->toolsamount}}</td><td style="background: darkgrey;">{{$invoice->totalamount+$invoice->toolsamount}}</td></tr>
      <tr><td colspan="5" style="background: white;text-align: right;">Total</td><td style="background: white;border-bottom: 1px solid grey;">{{$invoice->totalamount+$invoice->toolsamount}}</td></tr>
    
    </table>
    <hr style="margin-top: 50px;">
</body>
</html>
