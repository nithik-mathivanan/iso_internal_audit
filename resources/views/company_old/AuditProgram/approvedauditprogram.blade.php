@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Approved Audit View</h3>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Approved Audit View List</h4>
                        <h6 class="card-subtitle"></h6>                                         
                        <div class="table-responsive">
                            <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Audit Frequency</th>
                                        <th>Audit Number</th>
                                        <th>Comment</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($program as $companyprogram)
                                    <tr>
                                        <td>{{$sno++}}</td>
                                        <td>{{$companyprogram->audit_frequency}}</td>
                                        <td>

                                                @foreach($audit_number as $audit_number1)
                                                  @if($audit_number1->audit_frequency===$companyprogram->audit_frequency)
                                                       {{$audit_number1->audit_number}} <br/>
                                                   @endif
                                                @endforeach
                                               </td><td>
                                                     
  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{$companyprogram->audit_frequency}}"><i class="ti-eye" aria-hidden="true"></i></button>
  <div class="modal fade" id="myModal{{$companyprogram->audit_frequency}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
          <h3>Comment List</h3>
    @foreach($comment as $comment1)
      @if($comment1->audit_frequency===$companyprogram->audit_frequency)
         
    
    <p>  {{$comment1->comment}} </p>
       @endif
    @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </td>
                                        <td>{{$companyprogram->status}}</td>
                                        <td><a href="./approvedauditview/{{ Auth::user()->company_id }}/{{$companyprogram->audit_frequency}}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="View  Audit Program"><i class="ti-eye" aria-hidden="true"></i></a>
                                        </td>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
