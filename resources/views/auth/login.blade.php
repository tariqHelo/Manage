
<!DOCTYPE html>
<div lang="en" dir="rtl">
    <head>
    <meta charset="utf-8"/>
    <title>Metronic | Login Options - Login Form 4</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{asset('metroinc/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('metroinc/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('metroinc/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('metroinc/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('metroinc/assets/global/plugins/select2/select2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('metroinc/assets/admin/pages/css/login-soft-rtl.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{asset('metroinc/assets/global/css/components-md-rtl.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{asset('metroinc/assets/global/css/plugins-md-rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('metroinc/assets/admin/layout/css/layout-rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{asset('metroinc/assets/admin/layout/css/themes/darkblue-rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('metroinc/assets/admin/layout/css/custom-rtl.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
    </head>

<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="{{asset('metroinc/assets/admin/layout/img/logo-big.png') }}" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
    
                <div class="card-body">
                    <form action="{{ route('login') }}" class="login-form" method="POST">
                       @csrf
                    
                            <h3 class="form-title">Login to your account</h3>
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>
                                Enter any Email and password. </span>
                            </div>
                            <div class="form-group">
                                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                <label class="control-label visible-ie8 visible-ie9">Emai</label>
                                <div class="input-icon">
                                    <i class="fa fa-user"></i>
                                    <input class="form-control placeholder-no-fix" name="email" type="email" required autocomplete="email" autofocus placeholder="Email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Password</label>
                                <div class="input-icon">
                                    <i class="fa fa-lock"></i>
                                    <input class="form-control placeholder-no-fix" name="password"   type="password" autocomplete="off" placeholder="Password"/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <label class="checkbox">
                                <input type="checkbox" name="remember" value="1"/> Remember me </label>
                                <button type="submit" class="btn blue pull-right">
                                Login <i class="m-icon-swapright m-icon-white"></i>
                                </button>
                            </div>
                          
                        </form>
                    </div>
	<!-- END LOGIN FORM -->
</div>
<!-- END LOGIN -->
</div>
</html>



<script src="{{asset('metroinc/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/uniform/jquery.uniform.min.j') }}s" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('metroinc/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/global/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('metroinc/assets/global/plugins/select2/select2.min.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('metroinc/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{asset('metroinc/assets/admin/pages/scripts/login-soft.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
Layout.init(); // init current layout
  Login.init();
  Demo.init();
       // init background slide images
       $.backstretch([
        "{{asset('metroinc/assets/admin/pages/media/bg/1.jpg') }}",
        "{{asset('metroinc/assets/admin/pages/media/bg/2.jpg') }}",
        "{{asset('metroinc/assets/admin/pages/media/bg/3.jpg') }}",
        "{{asset('metroinc/assets/admin/pages/media/bg/4.jpg') }}"
        ], {
          fade: 1000,
          duration: 8000
    }
    );
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
