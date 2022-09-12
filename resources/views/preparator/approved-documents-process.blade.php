@extends('preparator.layout.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Document</h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Document List</h4>
						<a href="{{ route('upload-document') }}" class="btn btn-info btn-rounded" style="float:right">Add New Document
						</a>
						<h6 class="card-subtitle"></h6>
						<div class="table-responsive">
							<table id="document-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
								<thead>
									<tr>
										<th>SNo</th>
										<th>Name</th>
										<th>Document</th>
										<th>History</th>
										<th>Status</th>
										<th>Comment</th>
										<th>Approval-Status</th>
										<th>Revision</th>
										<th>Action</th>
										<th>Final Doc</th>
									</tr>
								</thead>
								<tbody>
									@foreach($documentupload as $documentupload)
									<tr>
										<td>{{$sno}}</td>										
										<td style="display:none">
											@foreach($document as $document1)
												@php
													if($document1->id==$documentupload->document_type){ @endphp
													{{$document1->type}}
													@php }	@endphp
											@endforeach
										</td>
										<td>{{$documentupload->document_name}}</td>
										<td>{{$documentupload->document}}</td>
										<td><a  href="../document/documenthistory/{{$documentupload->id}}">Click Here</a></td>
										<td>{{$documentupload->document_status}}</td>
										<td><a  href="../document/documentcomment/{{$documentupload->id}}">Comment</a></td>
										<td>
											<?php 
											if($documentupload->status=='1'){
												echo "Waiting for MR acceptance";
											}
											else if($documentupload->status=='2')
											{
												echo "Waiting for Review";
											}
											else if($documentupload->status=='3')
											{
												echo "Waiting for Approval";
											}
										else if($documentupload->status=='4')
											{
												echo "Approved and Waiting for MR upload";
											}
											else if($documentupload->status=='5')
											{
												echo "Rejected";
											}
											else if($documentupload->status=='6')
											{
												echo "Approved and Updated";
											}
											else{

											}
											?>
										</td>
										<td><a href="./document-edit/{{$documentupload->id}}" class="" data-toggle="tooltip" data-original-title="Edit" onclick="return confirm('Are you sure, You want to Edit this?');">Revise Doc?</a></td>
										<td><a href="./documentdestroy/{{$documentupload->id}}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are you sure, You want to delete this?');"><i class="ti-close" aria-hidden="true"></i></a></td>
										<td><?php 
											if($documentupload->status=='6'){
												?>
												
												<a href="{{$documentupload->document}}" download>Download</a>
												
											<?php } else { 
											
										
											}
											?>
											
											</td>
									</tr>
									@php $sno++; @endphp
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
@section('script')

@endsection