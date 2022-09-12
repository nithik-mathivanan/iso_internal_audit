@extends('layouts.admin')
@section('content')
 <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-8 col-md-5 col-sm-6 col-xs-12">
            <h4 class="page-title"> District List</h4>
        </div>   
        	 <div class="col-lg-4 col-sm-6 col-md-7 col-xs-12 text-right">
            <a href="{{ route('createdistrict') }}"
            class="btn btn-outline btn-success btn-sm">Add District<i class="fa fa-plus" aria-hidden="true"></i></a>

        </div>
</div>
<div class="row">
        <div class="col-md-12">
            <div class="white-box">
            	 <div class="table-responsive">
   
            <table class="table table-bordered" id="district">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>State</th>
                        <th>Country</th>
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
        $('#district').DataTable({
            processing: true,
            serverSide: true,
           ajax:{
            url:"{{route('districtdata')}}"
           },
                columns: [
                { data: 'name', name: 'name' },
                { data: 'state', name: 'state' },
                { data: 'country', name: 'country' },
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
                    url:"{{ route('deletedistrict')}}" ,
                      type: 'GET',
                      data: {
                           id:id,
                  },success: function(data)
                {  
                $('.top-right').notify({
        message: { text: "District Deleted Successfully" }
      }).show();                      
                    $('#district').DataTable().ajax.reload();
                    },
                });
            }
                console.log('This was logged in the callback: ' + result);
             }
        });
    });

</script>

@endsection