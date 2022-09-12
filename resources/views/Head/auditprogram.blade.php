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
                                        <tbody>
                                            <tr>
                                                <td>{{$sno++}}</td>
                                                <td>{{$companyprogram->audit_frequency}}</td>
                                                <td>{{$companyprogram->status}}</td>
                                               <td> 
													
                                               <td>
                                              
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