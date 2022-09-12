@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12 text-center">From: {{ $data['name'] }}
         <div class="panel panel-inverse pagination-centered">
            <div class="panel-heading">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body justify-content-center">
                   <div class="card">
                      {{ $data['message'] }}
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection