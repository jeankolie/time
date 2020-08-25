@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Inscrivez votre etudiant</h4>
            </div>
        </div>
    </div>     
    <!-- end page title -->

    <div class="row">
        <div class="col-6">
            @include('backend.forms.etudiant.form')
        </div>
        <div class="col-6">
            @include('backend.forms.etudiant.import')
        </div>
    </div>
@endsection







