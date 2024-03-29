@extends("layouts.master")
@section("body")

    <section class="login-page">
        <div class="login-page-body">

            <header class="login-page-header">
                <div class="login-page-header-background-container">
                    <div class="login-page-header-background"></div>
                </div>
                <h1 class="main-heading">Create account</h1>
                <span class="sub-heading">Create an account to access your dashboard if you don't have an account already.</span>
            </header>

            <section class="login-page-form-container">

                @if ($errors->any())
                    <div class="error-message-container">
                        <ul class="error-messages">
                            @foreach ($errors->all() as $error)
                                <li class="error-message">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="login-form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-block {{$errors->has('name') ? "has-error":""}}">
                        <label class="form-block-label" for="name"><i class="fas fa-user"></i> <span
                                class="sr-only">{{ __('Full Name') }}</span></label>
                        <input class="form-block-input" id="name" type="text" name="name"
                               value="{{old('name')}}" required placeholder="{{ __('Full Name') }}"
                               autofocus autocomplete="name"/>
                    </div>


                    <div class="form-block {{$errors->has('email') ? "has-error":""}}">
                        <label class="form-block-label" for="email"><i class="fas fa-envelope"></i><span
                                class="sr-only">{{ __('Email') }}</span></label>
                        <input class="form-block-input" id="email" type="email" name="email" value="{{old('email')}}"
                               required placeholder="{{ __('Email') }}"/>
                    </div>

                    <div class="form-block {{$errors->has('password') ? "has-error":""}}">
                        <label class="form-block-label" for="password"><i class="fas fa-key"></i><span
                                class="sr-only">{{ __('Password') }}</span></label>
                        <input class="form-block-input" id="password" type="password" name="password" required
                               placeholder="{{ __('Password') }}"
                               autocomplete="new-password"/>
                    </div>

                    <div class="form-block {{$errors->has('password') ? "has-error":""}}">
                        <label class="form-block-label" for="password_confirmation"><i class="fas fa-key"></i> <span
                                class="sr-only">{{ __('Confirm Password') }}</span></label>
                        <input class="form-block-input" id="password_confirmation" type="password"
                               name="password_confirmation" placeholder="{{ __('Confirm Password') }}"
                               required autocomplete="new-password"/>
                    </div>

                    <div class="form-btn-container">
                        <button type="submit" class="btn btn-login">
                            {{ __('Sign Up') }}
                        </button>
                    </div>
                </form>
            </section>

            <section class="login-page-footer">
                <div class="sign-up-link-container">
                    <span>Already have an account?</span>
                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
                <span class="connect-with-txt">Or connect with </span>

                <div class="socials-container">
                    <a class="social-btn fb-btn" href="/fb"><span class="sr-only">{{ __('Password') }}</span><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="social-btn google-btn" href="/google"><span class="sr-only">{{ __('Password') }}</span><i
                            class="fab fa-google-plus-g"></i></a>
                </div>
            </section>
        </div>

    </section>


@endsection

