@extends('admin.auth.layout')
@section('content')
@if($errors->isNotEmpty())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error</strong> {{$error}}
        @endforeach
    </div>
    
@endif
<form>
    <input type="text" name="email" placeholder="Name" required="">
    <input type="text" name="email" placeholder="Email" required="">
    <input type="password" name="password" class="lock" placeholder="Password">
    <div class="forgot-top-grids">
        <div class="forgot-grid">
            <ul>
                <li>
                    <input type="checkbox" id="brand1" value="">
                    <label for="brand1"><span></span>I agree to the terms</label>
                </li>
            </ul>
        </div>
        
        <div class="clearfix"> </div>
    </div>
    <input type="submit" name="Sign In" value="Sign up">														
</form>
<div class="sign-down">
<h4>Already have an account? <a href="/login"> Login here.</a></h4>
    <h5><a href="/">Go Back to Home</a></h5>
</div>