@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
        @endif
       <div class="app">
        <div class="bg"></div>
           <form method="POST" action="{{ route('password.email') }}" id="forgot-form">
            @csrf
            <header>
                <img src="https://assets.codepen.io/3931482/internal/avatars/users/default.png?format=auto&height=80&version=1592223909&width=80">
            </header>
            <div class="inputs">
                 <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                                @error('email')
                                    <span class="error @error('email') is-invalid @enderror"  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
             </div>
        </form>
    <footer>
      <button type="submit" id="forgot-submit" style="outline: none;">
                                    {{ __('Send Password forgot Link') }}
                                </button>      
         <p><a href="{{route('login')}}">back <b> &#8592; </b></a></p>
    </footer>
    </div>
   </div>
 </div>
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#forgot-submit").click(function(){
   $("#forgot-form").submit();
  });
});
</script>
@endsection('script')