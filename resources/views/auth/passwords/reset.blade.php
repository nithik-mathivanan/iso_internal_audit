@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
       <div class="app">
        <div class="bg"></div>
           <form method="POST" action="{{ route('password.update') }}" id="reset-form">
            @csrf
            <header style="height:80px;">
                <img src="https://assets.codepen.io/3931482/internal/avatars/users/default.png?format=auto&height=80&version=1592223909&width=80">
            </header>
            <div class="inputs" style="margin-top: 10px;">
              <input type="hidden" name="token" value="{{ $token }}">
               <input id="email" type="email"  name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="email">

                                @error('email')
                                    <span class="error @error('email') is-invalid @enderror" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <input id="password" type="password"  name="password" required autocomplete="new-password"
                placeholder="password">

                                @error('password')
                                    <span class="error @error('password') is-invalid @enderror" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
            </div>
        </form>
    <footer>
      <button type="submit" id="reset-submit" style="outline: none;">
                                    {{ __('Reset Password') }}
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
  $("#reset-submit").click(function(){
   $("#reset-form").submit();
  });
});
</script>
@endsection('script')