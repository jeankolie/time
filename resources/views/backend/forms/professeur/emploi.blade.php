<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="{{ asset('backend/assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/libs/jquery-confirm/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('backend/assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
        <link href="{{ asset('backend/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

        <!-- icons -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">

                        <div class="text-center">
                            <h2>
                                <a href="index.html">
                                    <img src="{{ asset('backend/assets/images/ucao.png') }}" alt="main-logo" height="64" />
                                </a>
                            </h2>

                            <h3 class="mt-1 text-white">
                                {{ __('Bienvenu :user', ['user' => Auth::user()->prenom.' '.Auth::user()->nom]) }}
                            </h3>
                            {{-- <p class="text-white">
                                {{ __('Licence: :lic', ['lic' => $licence->nom]) }}, 
                                {{ __('Departement: :dep', ['dep' => $licence->departement->nom]) }}
                            </p> --}}
                            <div class="card-box">
                                @include('backend.forms.professeur.table')
                            </div>

                            <a class="btn btn-danger btn-logout" href="{{ route('logout') }}">
                                {{ __('Deconnexion') }}
                            </a>
                        </div> <!-- end /.text-center-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
        </footer>


        <!-- Vendor js -->
        <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

        <script src="{{ asset('backend/assets/libs/dropify/js/dropify.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/assets/libs/jquery-confirm/jquery-confirm.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('.btn-logout').on('click', function (e) {
                    e.preventDefault();
                    var link = $(e.target).attr('href');
                    $.ajax({
                        url: link,
                        method: "POST",
                        dataType: "text",
                        success: function (data) {
                            document.location.reload(true);
                        }
                    });
                });
            });
        </script>
        
    </body>
</html>