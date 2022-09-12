@extends('layouts.superadmin')
@section('content')
<div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading">Document Template</div>

                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        
        <label class="required">Document Name:</label>{{$document->name}}
                                      
              <div class="text-right">
            <a href="{{route('document-template.index')}}"
            class="btn btn-outline btn-primary btn-sm">Back</a>
        </div>    
        <textarea id="editor" name="content">
	{{$post->content}}

</textarea>

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