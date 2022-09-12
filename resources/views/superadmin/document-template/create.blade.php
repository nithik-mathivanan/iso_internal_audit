@extends('layouts.superadmin')
@section('content')
<div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading">Document Template Create</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
        	    	<form method="POST" action="{{ route('document-template.store') }}">
        	    		@csrf
                        
                         <div class="form-group">
                                            <label class="required">Document Name</label>
                                            <select class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" name="name">
                                                <option disabled selected hidden>Select Name</option>
                                                @foreach($document as $list)
                                                <option value="{{$list->id}}">{{$list->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                         @if($errors->has('name'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                    </span>
                    @endif
             
        <textarea id="editor" name="content">
	

</textarea>
 @if($errors->has('content'))
                   <span class="invalid-feedback">
                    <strong>{{$errors->first('content')}}</strong>
                    </span>
                    @endif

<button type="submit">submit</button>
</form>
 </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')

<script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/ckeditor/lang/en.js')}}"></script>
<script src="{{asset('public/ckeditor/styles.js')}}"></script>


<script>
    CKEDITOR.replace('editor');
</script>

@endsection