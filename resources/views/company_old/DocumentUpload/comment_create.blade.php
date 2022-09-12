@extends('company.layouts.app')
@section('content')
<div class="page-wrapper">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Add Comment </h3>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4></h4><!-- @php
						if(Auth::user()->role==4){
							@endphp
							<a href="{{ route('mrdocumentview') }}" class="btn btn-info btn-rounded" style="float:left">Back
						</a>
						@php
						}
						else{ @endphp
						<a href="{{ route('documentview') }}" class="btn btn-info btn-rounded" style="float:left">Back
						</a>
						@php 
						}
						@endphp <br/><br/> --><h4 class="card-title">Comment</h4>
						<div class="table-responsive">
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
							<form class="m-t-40"   method="POST" action="{{ route('comment_create') }}" enctype="multipart/form-data">
								@csrf
								@foreach($documentupload as $documentupload)
								
								<input type="hidden" name="id"  value="{{$documentupload->id}}" > 								
								@endforeach
								<input type="hidden" name="user_id"  value="{{Auth::user()->id}}" > 
								<div class="form-group">
									<div class="controls">
										 <input type="text" name="comment" class="form-control" value="{{old('comment') }}" > 
										 <div class="help-block"></div>
									</div>
								</div>
								<div class="text-xs-right">
									<button type="submit" class="btn btn-info">Submit</button>
								</div>
							</form>
							<script>
							$('form input').blur(function() {
							if(!$.trim(this.value).length) { 
							$(this).parents('p').addClass('warning');
							}
							});
							</script>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Comment List</h4>
						
						<h6 class="card-subtitle"></h6>
						<div class="table-responsive">
							<table id="document-grid" class="table m-t-30 table-hover contact-list" data-page-size="10">
								<thead>
									<tr>
										<th>SNo</th>
										<th>Comment</th>
										<th>User</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									@foreach($documentcomment as $documentcomment1)
									<tr>
										<td>{{$sno}}</td>
										<td>{{$documentcomment1->comment}}</td>
										<td>@foreach($user as $user1) 
											@php 
											if($user1->id==$documentcomment1->user_id){
												@endphp {{$user1->name}} @php
											}
										@endphp @endforeach</td>
										
										<td>{{$documentcomment1->created_at}}</td>
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
