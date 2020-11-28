@extends("layouts.master")
@section("body")

    <section class="login-page">

        <header class="login-page-header">
            <div class="login-page-header-background-container">
                <div class="login-page-header-background"></div>
            </div>
            <h1 class="main-heading"><div>Hi! <div>Welcome Back</div></div></h1>
            <span class="sub-heading">Please sign in to continue</span>
        </header>

        <section class="login-page-form-container">
{{--            <div class="main-logo">--}}
{{--                <a href="/"><img src="/images/logo.png" alt=""></a>--}}
{{--            </div>--}}

            @if ($errors->any())
                <div class="error-message-container">
                    <ul class="error-messages">
                        @foreach ($errors->all() as $error)
                            <li class="error-message">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-block">
                    <label class="form-block-label" for="email"><i class="fas fa-envelope"></i> <span class="sr-only">{{ __('Email') }}</span>
                    </label>
                    <input id="email" class="form-block-input" type="email" name="email" value="{{old('email')}}"
                           required
                           placeholder="Email" autofocus/>
                </div>

                <div class="form-block">
                    <label class="form-block-label" for="password"><i class="fas fa-key"></i> <span class="sr-only">{{ __('Password') }}</span></label>
                    <input id="password" class="form-block-input" type="password" name="password" required
                           placeholder="Password" autocomplete="current-password"/>
                </div>

                <div class="forgot-password-txt-container">
                    <a class="forgot-password-txt" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                </div>

                <div class="form-btn-container">
                    <button type="submit" class="btn btn-login">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </section>


        <section class="login-page-footer">
            <div class="sign-up-link-container">
                <span>Don't have an account?</span>
                <a class="" href="{{ route('register') }}">{{ __('Sign up') }}</a>
            </div>
            <span class="connect-with-txt">Or connect with </span>

            <div class="socials-container">
                <a class="social-btn fb-btn" href="/fb"><span class="sr-only">{{ __('Password') }}</span><i class="fab fa-facebook-f"></i></a>
{{--                <a class="social-btn twitter-btn" href="/twitter"><span class="sr-only">{{ __('Password') }}</span><i class="fab fa-twitter"></i></a>--}}
                <a class="social-btn google-btn" href="/google"><span class="sr-only">{{ __('Password') }}</span><i class="fab fa-google-plus-g"></i></a>
            </div>
        </section>
    </section>
@endsection

