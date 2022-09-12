@extends('company.layouts.app')


@section('content')
 <div class="page-wrapper">
           
            <div class="row page-titles">
               <div class="col-md-5 align-self-center">
                  <h3 class="text-themecolor">Circulate View</h3>
               </div>
            </div>
           
            <div class="container-fluid">
             
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Circulate View List</h4>
 
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Audit Frequency</th>
                                                <th>status</th>
                                                
                                                <th>Action</th>
                                                <th  style="display:none">Approval</th>
                                            </tr>
                                        </thead>
                                        <tbody>							@foreach($program as $companyprogram)
                                            <tr>
                                                <td>{{$sno++}}</td>
                                                <td>{{$companyprogram->audit_frequency}}</td>
                                                <td>{{$companyprogram->status}}</td>
                                               <td> 													<a href="./headview/{{ Auth::user()->company_id }}/{{$companyprogram->audit_frequency}}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="View Audit Program"><i class="ti-eye" aria-hidden="true"></i></a>
																										 </td>
                                               <td>							<form action="{{url('sendemail/send')}}" method="POST" style="display:none">								{{ csrf_field() }} 								<input type="text" value="{{ Auth::user()-> email }}" name="mailid" />								<input type="text" value="Message from MR" name="message" /> 								<input type="text" name="period" value="{{$companyprogram->audit_frequency}}" />								<button class="btn btn-info">Send For Approval</button>								</form>									</td>
                                              
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
