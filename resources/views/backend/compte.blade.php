@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <h4 class="page-title">Vos informations personnelles</h4>
           	</div>
        </div>
    </div>     
    <!-- end page title -->

    <div class="row">
        <div class="col-4">
            <div class="card-box text-center">
                    <img src="{{ asset('backend/assets/images/users/user-1.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                     <h4 class="mb-0">{{ old('prenom') ?? Auth::user()->prenom }} {{ old('nom') ?? Auth::user()->nom }}</h4>

                    <div class="text-left mt-3">
                        <h4 class="font-13 text-uppercase">A propos de moi :</h4>           
                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">{{ old('prenom') ?? Auth::user()->prenom }} {{ old('nom') ?? Auth::user()->nom }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">{{ old('telephone') ?? Auth::user()->telephone }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{ old('email') ?? Auth::user()->email }}</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Fonction :</strong> <span class="ml-2"><th>{{ old('type') ?? Auth::user()->type }}</span></p>
                    </div>

            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-11">
                    @include('backend.forms.profil.profil')
                </div>
                
            </div>
            <div class="row">
                <div class="col-11">
                    @include('backend.forms.profil.password')
                </div>
            </div>
        </div>
    
    
    
    </div>
@endsection