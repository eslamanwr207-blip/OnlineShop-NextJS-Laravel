<html>
<head>

    <link href="{{asset('css/auth.css')}}" rel="stylesheet" >
</head>
<body>
<div class="auth-container">
    <div class="auth-box">
        <div class="a" >
            <h2>تسجيل الدخول</h2>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <label>البريد الالكتروني</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                     </span>
                @enderror
            </div>

            <div class="input-group">
                <label>كلمة المرور</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
                @enderror
{{--                <div class="form-group row">--}}
{{--                    <div class="col-md-6 offset-md-4">--}}
{{--                        <div class="form-check">--}}
{{--                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
{{--                            <label class="form-check-label" for="remember">--}}
{{--                                {{ __('تذكرني') }}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <button type="submit" class="auth-button">
                {{ __('تسجيل الدخول') }}
            </button>
        </form>
       <div class="a" >
           <a id="a" href="/register" >انشاء حساب جديد</a>
       </div>
    </div>
</div>

</body>
</html>






