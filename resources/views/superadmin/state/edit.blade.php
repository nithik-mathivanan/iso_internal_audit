@extends('layouts.admin')
@section('content')
<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-8 col-md-5 col-sm-6 col-xs-12">
            <h4 class="page-title">State</h4>
        </div>   
</div>

<div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> State Edit</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                            <div class="form-body">
                               <form method="POST" action="{{route('updatestate',['id'=>$post->id])}}">
                               	@csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="required">State Name</label>
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
                                            <label class="required">Country</label>
                                            <select class="form-control {{ $errors->has('country') ? 'is-invalid':'' }}" name="country">
                                                <option disabled selected hidden>Select Country</option>
                                                @foreach($country as $list)
                                                <option value="{{$list->id}}" @if(old('country',$post->country ?? null)==$list->id)
                                                                    {{ 'selected' }} @endif>{{$list->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                         @if($errors->has('country'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('country')}}</strong>
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