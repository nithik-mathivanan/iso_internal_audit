@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
       <div class="app">
        <div class="bg"></div>
        <form method="POST" action="{{ route('login') }}" id="user-form">
            @csrf
            <header>
                <img src="https://assets.codepen.io/3931482/internal/avatars/users/default.png?format=auto&height=80&version=1592223909&width=80">
            </header>
            <div class="inputs">
                <input id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                @error('email')
                                    <span class=" error @error('email') is-invalid @enderror" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                 <input id="password" type="password"  name="password" required autocomplete="current-password" placeholder="password">
                                @error('password')
                                    <span class="error @error('password') is-invalid @enderror" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <p class="light"><a  href="{{ route('password.request') }}">Forgot password?</a></p>
            </div>
        </form>
    <footer>
      <button id="form-submit" style="outline:none;"> {{ __('Login') }} </button>        
         <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
    </footer>
    </div>
   </div>
 </div>
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  $("#form-submit").click(function(){
   $("#user-form").submit();
  });
});
</script>
@endsection('script')