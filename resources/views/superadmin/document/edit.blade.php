@extends('layouts.superadmin')

@push('head-script')
<link rel="stylesheet" href="{{ asset('public/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/plugins/bower_components/switchery/dist/switchery.min.css') }}">
    <style>
        .m-b-10{
            margin-bottom: 10px;
        }
    </style>
@endpush

@section('content')
<div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading">Document Edit</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                       <form method="POST" action="{{route('document.update',['id'=>$post->id])}}">
                        @csrf
                        @method('PUT')
                            <div class="form-body">
                                <div class="col-md-12">
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label required">Name</label>
                                            <input type="text" id="name" name="name" value="{{ $post->name ?? '' }}" class="form-control" >
                                              @if($errors->has('name'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                    </span>
                    @endif
                                        </div>
                                    </div>

                            </div>
                        </div>
               <div class="col-md-12">
                                <div class="col-md-4">
                            <div class="form-actions">
                                <button type="submit" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>

                            </div>
                        </div>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection