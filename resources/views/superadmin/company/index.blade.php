@extends('layouts.superadmin')
@section('content')
<div class="row bg-title">
		<!-- .page title -->
		<div class="col-lg-8 col-md-5 col-sm-6 col-xs-12">
			<h4 class="page-title">Company List</h4>
		</div>   

		  <div class="col-lg-4 col-sm-6 col-md-7 col-xs-12 text-right">
			<a href="{{ route('createcompany') }}"
			class="btn btn-outline btn-success btn-sm">Add Company &nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></a>
		</div>
   
</div>
<div class="row">
		<div class="col-md-12">
			<div class="white-box">
				 <div class="table-responsive">
   
			<table class="table table-bordered" id="companytable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Package</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
</div>
	  
</section>
@endsection

@section('script')
<script>
	$(function() {
		$('#companytable').DataTable({
			processing: true,
			serverSide: true,
		   ajax:{
			url:"{{route('companydata')}}"
		   },
				columns: [
				{ data: 'name', name: 'name' },
				{ data: 'email', name: 'email' },
				 { data: 'phone', name: 'phone' },
				{data:'package',name:'package'},
				{ data: 'action', name: 'action', orderable: false, searchable: false},
				],
				responsive: !0,
		});
	});

	 $(document).on('click','.delete',function(){
		id=$(this).data('id');
			bootbox.confirm({
			message: "Do you want confirm?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},

			callback: function (result) {
				if(result){
					$.ajax({
						url:"{{ route('deletecompany')}}" ,
					 	type: 'GET',
					  	data: {
						   id:id,
					  	},success: function(data){   
							$('.top-right').notify({
								message: { text: "Company Deleted Successfully" }
							}).show();                
							$('#companytable').DataTable().ajax.reload();
						},
					});
				}
				console.log('This was logged in the callback: ' + result);
			}
		});
	});

</script>

@endsection