<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IMC dashboard</title>

    <!-- Global stylesheets -->
    <link href="{{asset('dashboard/assets/fonts/inter/inter.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dashboard/assets/icons/phosphor/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dashboard/assets/css/ltr/all.min.css')}}" id="stylesheet" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('dashboard/assets/demo/demo_configurator.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('dashboard/assets/js/app.js')}}"></script>
    <!-- /theme JS files -->

</head>

<body>
<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login form -->
                <form class="login-form" action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                    <img src="{{asset('dashboard/assets/images/logo_icon.svg')}}" class="h-48px" alt="">
                                </div>
                                <h5 class="mb-0">Please enter login</h5>
                                <span class="d-block text-muted">Using your login and password</span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Login</label>
                                <div class="form-control-feedback form-control-feedback-start">
                                    <input type="text" class="form-control" placeholder="login" name="login">
                                    <div class="form-control-feedback-icon">
                                        <i class="ph-user-circle text-muted"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="form-control-feedback form-control-feedback-start">
                                    <input type="password" class="form-control" placeholder="•••••••••••"
                                           name="password">
                                    <div class="form-control-feedback-icon">
                                        <i class="ph-lock text-muted"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Log in</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /login form -->

            </div>
            <!-- /content area -->
        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->

</div>
<script src="{{asset('dashboard/assets/js/jquery/jquery.min.js')}}"></script>
<!-- /page content -->
</body>
</html>
