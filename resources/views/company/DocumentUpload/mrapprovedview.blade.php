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
										<th>Prepared</th>
										<th>Dept</th>
										<th>Name</th>
										<th>Document</th>
										<th>History</th>
										<th>Status</th>
										<th>Comment</th>
										<th>Action</th>
										<th>Final Doc</th>
									</tr>
								</thead>
								<tbody>
									@foreach($documentupload as $documentupload)
									<?php if($documentupload->status=='4' || $documentupload->status=='6'){ ?>
									<tr>
										<td>{{$sno}}</td>
										<td>
										
									@foreach($user as $user1)
									@php	if($user1->id==$documentupload->user_id){ @endphp
										{{$user1->name}}
										@php }	@endphp
									@endforeach
										</td>
										<td>
											@foreach($department as $department1)
												@php
													if($department1->id==$documentupload->department){ @endphp
													{{$department1->name}}
													@php }	@endphp
											@endforeach
										</td>
										<td style="display:none">
											@foreach($document as $document1)
												@php
													if($document1->id==$documentupload->document_type){ @endphp
													{{$document1->type}}
													@php }	@endphp
											@endforeach
										</td>
										<td>{{$documentupload->document_name}}</td>
										<td><?php 
											if($documentupload->status=='4')
											{?>
												{{$documentupload->document}}
												
											<?php }
											else if($documentupload->status=='6')
											{
												
												
											 }?>
										
										</td>
										<td><a  href="../document/documenthistory/{{$documentupload->id}}">Click Here</a></td>
										<td>{{$documentupload->document_status}}</td>
										<td><a  href="../document/documentcomment/{{$documentupload->id}}">Comment</a></td>
										<td><?php 
											if($documentupload->status=='4'){
												?>
												<a  href="./documentacceptmr/{{$documentupload->id}}">Accept</a>
											<?php }
											else if($documentupload->status=='6')
											{
												echo "Approved and Updated";
												
											}  ?>
											
											</td>
											
											<td><?php 
											if($documentupload->status=='6'){
												?>
												
												<a href="{{$documentupload->document}}" download>Download</a>
												
											<?php } else { 
											
											echo "Waiting For MR Approval";
											}
											?>
											
											</td>
											
									</tr>
									<?php } ?>
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