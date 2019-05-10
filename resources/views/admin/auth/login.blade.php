@extends('admin/auth/layout')
@section('content')

@if($errors->isNotEmpty())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error</strong> {{$error}}
        @endforeach
    </div>
    
@endif
<form method="POST" action="{{route('perform-login')}}">
    @csrf
    <input type="text" name="email" placeholder="Email" required="">
    <input type="password" name="password" class="lock" placeholder="Password">
    <div class="forgot-top-grids">
        <div class="forgot-grid">
            <ul>
                <li>
                    <input type="checkbox" id="brand1" value="">
                    <label for="brand1"><span></span> {{ __('Remember Me') }}</label>
                </li>
            </ul>
        </div>
        <div class="forgot">
        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                </div>
                <div class="clearfix"> </div>
            </div>
            <input type="submit" name="Sign In" value="Login">	
            <h3>Not a member?<a href="signup.html"> Sign up now</a></h3>				
            <h2>or login with</h2>
            <div class="login-icons">
                <ul>
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>						
                </ul>
            </div>
				</form>
				<h5><a href="index.html">Go Back to Home</a></h5>
@stop()