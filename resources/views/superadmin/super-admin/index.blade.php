@extends('layouts.superadmin')
@section('content')
<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-8 col-md-5 col-sm-6 col-xs-12">
            <h4 class="page-title">Super Admin</h4>
        </div>
         <div class="col-lg-4 col-sm-6 col-md-7 col-xs-12 text-right">
            <a href="{{ route('createsuperadmin') }}"
            class="btn btn-outline btn-success btn-sm">Add Super Admin<i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>   
</div>
<div class="row">
        <div class="col-md-12">
            <div class="white-box">
            	 <div class="table-responsive">
            <table class="table table-bordered" id="superadmin_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
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
        $('#superadmin_table').DataTable({
            processing: true,
            serverSide: true,
           ajax:{
            url:"{{route('superadmindata')}}"
           },
                columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
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
                    url:"{{ route('deletesuperadmin')}}" ,
                      type: 'GET',
                      data: {
                           id:id,
                  },success: function(data)
                {   
                     $('.top-right').notify({
        message: { text: "Super Admin Deleted Successfully" }
      }).show();                
                    $('#superadmin_table').DataTable().ajax.reload();
                    },
                });
            }
                console.log('This was logged in the callback: ' + result);
             }
        });
    });

</script>

@endsection