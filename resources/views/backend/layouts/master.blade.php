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
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- Plugins css -->
        <link href="{{ asset('backend/assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

		<!-- App css -->
		<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="{{ asset('backend/assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/assets/libs/jquery-confirm/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />

		<link href="{{ asset('backend/assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="{{ asset('backend/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- {{ Auth::logout() }} --}}
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">
                        <li class="text" >
                           <a class="nav-link dropdown-toggle aria-haspopup=" >
                                <i class="fe- noti-icon" style="color: white;">{{ __('Departement: :dep', ['dep' => Auth::user()->departement->nom]) }}</i>
                            </a> 
                        </li>
                        <li class="dropdown d-inline-block d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>
                            
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                                <i class="fe-maximize noti-icon"></i>
                            </a>
                        </li>
    
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('backend/assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1">
                                    {{ Auth::user()->prenom }} {{ Auth::user()->nom }} <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
    
                                <div class="dropdown-divider"></div>
    
                                <!-- item-->
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item btn-logout">
                                    <i class="fe-log-out"></i>
                                    <span href="{{ route('logout') }}">{{ __('Deconnexion') }}</span>
                                </a>
    
                            </div>
                        </li>
    
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="/" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>
    
                        <a href="/" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="20">
                            </span>
                        </a>
                    </div>
    
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li> 
                        @if (Auth::user()->type == 3)
                            <li class="">
                                <a class="nav-link waves-effect waves-light" href="#">
                                    {{ __('Departement: :dep', ['dep' => Auth::user()->departement->nom]) }}
                                </a>
                            </li> 
                        @endif
                             
    
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="../assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-toggle="dropdown">{{ Auth::user()->prenom }}</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user mr-1"></i>
                                    <span>My Account</span>
                                </a> --}}

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out mr-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">{{ __('Time Manager') }}</li>

                            <li>
                                <a href="/home">
                                    <i class="mdi mdi-monitor-dashboard"></i>
                                    <span> Tableau de bord </span>
                                </a>
                            </li>

                                
                            @if (Auth::user()->type == 1)
                                <li>
                                    <a href="{{ route('annees.index') }}">
                                        <i class="mdi mdi-apps"></i>
                                        <span> Annees </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('departements.index') }}">
                                        <i class="mdi mdi-order-bool-ascending"></i>
                                        <span> Departements </span>
                                    </a>
                                </li>
                                
                            @endif

                            <li>
                                <a href="{{ route('matieres.index') }}">
                                    <i class="mdi mdi-account-group-outline"></i>
                                    <span> Matieres </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('salles.index') }}">
                                    <i class="mdi mdi-apps"></i>
                                    <span> Salles </span>
                                </a>
                            </li>
                            
                            @if (Auth::user()->type == 2)

                                <li>
                                    <a href="{{ route('departements.show', Auth::user()->departement->slug) }}">
                                        <i class="mdi mdi-apps"></i>
                                        <span> Personnels </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#sidebarContacts" data-toggle="collapse">
                                        <i data-feather="book"></i>
                                        <span> {{ __('Etudiants') }} </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarContacts">
                                        <ul class="nav-second-level">
                                            @foreach (App\Models\Annee::get() as $an)
                                                <li>
                                                    <a href="/etudiants/{{ $an->slug }}">{{ $an->nom }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <a href="{{ route('emplois.index') }}">
                                        <i class="mdi mdi-account-group-outline"></i>
                                        <span> {{ __('Emplois') }} </span>
                                    </a>
                                </li>
                            @endif
                                
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        @yield('content')
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Tobi
                            </div>
                            
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

        <!-- Plugins js -->
        <script src="{{ asset('backend/assets/libs/dropify/js/dropify.min.js') }}"></script>

        <script src="{{ asset('backend/assets/libs/dropify/js/dropify.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/assets/libs/jquery-confirm/jquery-confirm.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                if ($('[data-plugins="dropify"]').length > 0) {
                    // Dropify
                    $('[data-plugins="dropify"]').dropify({
                        messages: {
                            'default': 'Drag and drop a file here or click',
                            'replace': 'Drag and drop or click to replace',
                            'remove': 'Remove',
                            'error': 'Ooops, something wrong appended.'
                        },
                        error: {
                            'fileSize': 'The file size is too big (1M max).'
                        }
                    });
                }

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

                $(".btn-delete").on('click', function (e) {
                    e.preventDefault();
                    var link = $(e.target).attr('href');
                    //alert(link);
                    $.confirm({
                        title: 'Attention !',
                        content: $('input[name=message-suppression]').val(),
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            Supprimer: function () {
                                $.ajax({
                                    url: link,
                                    method: "DELETE",
                                    dataType: "json",
                                    success: function (data) {
                                        if(data.statut){
                                            if(typeof(data.departement) != "undefined"){
                                                document.location.href = '/departements';
                                            }else{
                                                document.location.reload(true);
                                            }
                                        }
                                    },
                                    error: function (xhr, status, error) {
                                        alert(xhr.responseText);
                                    }
                                });
                            },
                            Annuler: function () {
                                return true;
                            }
                        }
                    });
                });
            });
        </script>
        @yield('custom-script')
    </body>
</html>