@extends('frontend.layouts.guest')
@section('auth_content')
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
            <div class="login-right text-center">
						<div class="login-right-wrap">
                
                <h3>{{__('Welcome to Login')}}</h3>
        
                <p>{{__('Login to see it in action.')}}</p>

                @if ($errors->any())
                    <div >
                        <div class="font-medium text-red-600">
                            {{ __('Error! Something went wrong.') }}
                        </div>

                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="user@gmail.com" value="{{old('email')}}"  autofocus> 
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="password" placeholder="123456789" autocomplete="current-password"> 
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </div>
                </form>
                
                
                <div class="text-center dont-have">{{__('Do not have an account?')}} 
                    <a href="{{ route('register') }}">{{__('Create an account')}}</a>
                    <br>
                    <a href="{{ route('/') }}">{{__('Back to site')}}</a>
                </div>

              
</div>
</div>
        
            </div>
        </div>
    </div>
</div>
@endsection




