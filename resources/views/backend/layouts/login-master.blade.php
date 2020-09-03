<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In -UCAO-UUCo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/ucao.png') }}">

		<!-- App css -->
		<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{ asset('backend/assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="{{ asset('backend/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-fluid-pages pb-0">

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-left">
                            <div class="auth-logo">
                                <a href="" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend/assets/images/ucao.png') }}" alt="" height="250">
                                    </span>
                                </a>
            
                                <a href="" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend/assets/images/ucao.png') }}" alt="" height="250">
                                    </span>
                                </a>
                            </div>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Connectez-vous</h4>
                        <p class="text-muted mb-4">Entrer votre numero ou email et votre mot de passe pour acceder a votre compte.</p>
                        @include('backend.layouts.info')
                        <!-- form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="emailaddress">{{ __('Login') }}</label>
                                <input class="form-control" type="text" name="telephone">
                            </div>
                            <div class="form-group">
                                <label>{{ __('Mot de passe') }}</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" name="password" >
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                    <label class="custom-control-label" for="checkbox-signin">Se souvenir de moi</label>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit">Se connecter </button>
                            </div>
                            <!-- social-->
                            <div class="text-center mt-4">
                                

                            </div>
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Si vous n'avez pas de compte, <a href="" class="text-muted ml-1"><b>Veuillez contacter UCAO-UUCo</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3 text-white">UCAO-UUCo</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Gerer votre emploi du temps en toute simplicite <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <h5 class="text-white">
                        - Apprendre a Apprendre
                    </h5>
                    <h5 class="text-white">
                        - Apprendre a Entreprendre 
                    </h5>
                    <h5 class="text-white">
                        - Apprendre a Etre Responsable
                    </h5>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- Vendor js -->
        <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
        
    </body>
</html>