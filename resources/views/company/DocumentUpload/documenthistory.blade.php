@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Document History</h3>
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
										<th>Message</th>
										<th>Status</th>
										<th>Downloads</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									@foreach($documenthistory as $documenthistory1)
									<tr>
										<td>{{$sno}}</td>
										<td>{{$documenthistory1->document}}</td>
										<td></td>
										<td><a href="../../public/document/{{$documenthistory1->document}}">{{$documenthistory1->document}}</a></td>
										
										<td>{{$documenthistory1->created_at}}</td>
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