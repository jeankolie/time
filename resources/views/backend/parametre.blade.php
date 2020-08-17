@extends('backend.layouts.master')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('Parametres') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Formulaire') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('Gestion des parametres') }}</h4>
                </div>
            </div>
        </div><!-- end page title -->
        @include('backend.layouts.info')
        <div class="row">
            @foreach ($parametres as $parametre)
                <div class="col-md-6">
                    @include('backend.partials.parametre', ['parametre' => $parametre])
                </div>
            @endforeach
        </div>
        {{ $parametres->links() }}
@endsection