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
			url:"{{route('auditeencviewdetail')}}"
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
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" >First Name : </label>
            <div class="col-md-8">
             <input type="text" name="first_name" id="first_name" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Last Name : </label>
            <div class="col-md-8">
             <input type="text" name="last_name" id="last_name" class="form-control" />
            </div>
           </div>
                <br />
                <div class="form-group" align="center">
                 <input type="hidden" name="action" id="action" value="Add" />
                 <input type="hidden" name="hidden_id" id="hidden_id" />
                 <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                </div>
         </form>
        </div>
     </div>
    </div>
</div>
