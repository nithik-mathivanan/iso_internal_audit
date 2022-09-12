@extends('company.layouts.app')
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
						
						<h6 class="card-subtitle"></h6>
						<div class="table-responsive">
							<table id="document-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
								<thead>
									<tr>
										<th>SNo</th>
										<th>Document Name</th>
										<th>Document</th>
										<th>History</th>
										<th>Status</th>
										<th>Comment</th>
										<th>Approval Status</th>
										<th>Action </th>
										<th> Final Doc</th>
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
										<td><a  href="./documenthistory/{{$documentupload->id}}">Click Here</a></td>
										<td>{{$documentupload->document_status}}</td>
										<td><a  href="../document/documentcomment/{{$documentupload->id}}">Comment</a></td>
										<td><?php 
											if($documentupload->status=='1'){
												echo "Waiting for MR acceptance";
											}
											else if($documentupload->status=='2')
											{
												echo "Waiting for  Review";
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
											?></td>
											
										
										<td>
											<?php if($documentupload->status=='3')
											{ ?>
												<a  href="./approved_document/{{$documentupload->id}}/4" class="btn btn-sm btn-info">Apporve</a><br/>
											<a  href="./approved_document/{{$documentupload->id}}/5" class="btn btn-sm btn-danger">Reject</a></td>
										<?php } ?>
										
											<td><?php 
											if($documentupload->status=='6'){
												?>
												
												<a href="{{$documentupload->document}}" download> Download</a>
												
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