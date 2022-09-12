@extends('layouts.admin')
@section('content')
<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-8 col-md-5 col-sm-6 col-xs-12">
            <h4 class="page-title">District</h4>
        </div>   
</div>

<div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> District Create</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                            <div class="form-body">
                               <form method="POST" action="{{route('storedistrict')}}">
                               	@csrf
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">District Name</label>
                                            <input type="text" name="name" id="name"  value="{{ $post->name ?? '' }}"   class="form-control">
                                        </div>
                                         @if($errors->has('name'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                    </span>
                    @endif
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="required">State</label>
                                            <select class="form-control {{ $errors->has('state') ? 'is-invalid':'' }}" name="state">
                                                <option disabled selected hidden>Select State</option>
                                                @foreach($state as $list)
                                                <option value="{{$list->id}}">{{$list->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                         @if($errors->has('state'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('state')}}</strong>
                    </span>
                    @endif
                                    </div>
                                    <!--/span-->
                                </div>

                                 <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection